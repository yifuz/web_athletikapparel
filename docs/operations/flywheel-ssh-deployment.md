# Flywheel SSH 部署工作流程

最后更新：2026-11-04。状态：专用连接及首次生产发布已验证；本文件是后续部署的操作入口。

## 分工与授权

所有者于 2026-11-04 明确：**Local 用于本地页面审核，直接部署由 Codex 完成。**

默认流程：**Local 开发与验收 → 所有者确认上线 → Codex 通过 SSH 部署生产 → 线上验收 → 记录与汇报**。

- 所有者审核本地页面与待上线内容，Codex 准备可审查的版本和完整部署清单，并负责后续备份、传输、必要建页操作及验收。
- 已明确要求“部署”“上线”或确认该版本可发布，且范围没有变化时，继续完成整批工作，不重复索取同一项授权；不再把文件上传或服务器命令交回所有者执行。
- “暂不上线”“仅供审核”等约束仍有效。连接可用不代表未批准草稿或其他任务也可发布；在生产上不临时改写未审核的页面内容。
- 如本轮只修改文档，则提交并推送即可，不连接生产或上传文档。

## 已验证的连接

- 正式站：`https://www.athletikapparel.com/`。
- 使用 Git 随附 OpenSSH：`C:\Program Files\Git\usr\bin\ssh.exe`。
- 独立配置：`C:\Users\Administrator\.ssh\athletik-flywheel.conf`。
- 正式站别名：`athletik-production`；网关别名：`athletik-flywheel-gateway`。
- 私钥：`C:\Users\Administrator\.ssh\athletik_flywheel_deploy`，只保存在本机；ACL 已限制为当前 Windows 用户及 SYSTEM，不进入主题、Git 或生产站。
- 公钥：同路径加 `.pub`，已由所有者添加到 Flywheel。公钥指纹为 `SHA256:Gjfcl4GHHtQQnRiAUuYZlSWnMMyhIkDlmY7XL5Y7RhU`。
- 独立主机记录：`C:\Users\Administrator\.ssh\known_hosts_athletik_flywheel`。首次连接记录 ECDSA 指纹 `SHA256:bSa5GVUFX6kDNonOXwAKlTTEmrHdCb5/dSEoWm8Jsug`；这是本次连接观察值，不是官方公开指纹证明。后续配置为 `StrictHostKeyChecking yes`，不得跳过变化警告。
- `IdentitiesOnly yes`、`ForwardAgent no`、仅公钥认证；不复用原有 GitHub 密钥，不读取浏览器登录 Cookie。

## 目录与检查命令

Flywheel SSH 当前文件根为 `/www`，主题路径为 `/www/wp-content/themes/myathletik-child`；WordPress 核心 `ABSPATH` 为 `/www/.wordpress/`，映射到平台管理的核心目录。不要给 WP-CLI 强行加 `--path=/www`，该目录没有完整的 `wp-settings.php`。

PowerShell 只读检查（每次部署前执行；不输出私钥或其他凭据）：

```powershell
$deploySsh = 'C:\Program Files\Git\usr\bin\ssh.exe'
$deployConfig = 'C:/Users/Administrator/.ssh/athletik-flywheel.conf'
$deployChecks = @(
    'wp option get home',
    'wp option get stylesheet',
    'wp eval ''echo wp_get_environment_type();''',
    'wp eval ''echo get_stylesheet_directory();''',
    'wp eval ''echo wp_upload_dir(null, false)["basedir"];'''
)
foreach ($deployCheck in $deployChecks) {
    & $deploySsh -T -F $deployConfig athletik-production $deployCheck
    if ($LASTEXITCODE -ne 0) { throw '部署前只读检查失败；尚未写入。' }
}
```

期望值依次为 `https://www.athletikapparel.com`、`myathletik-child`、`production`、`/www/wp-content/themes/myathletik-child`、`/www/wp-content/uploads`。逐项核对后才写入；以上路径为 2026-11-04 的连接记录，不能在后续环境变化时盲用。

Windows 系统 OpenSSH 在首次非交互调用中出现 `GetConsoleMode on STD_INPUT_HANDLE failed with 6` 并未正常退出；Git OpenSSH 已验证正常。平台 WP-CLI 可能输出 `/www/.wordpress/` 的 `fileperms()` 警告；首次命令返回成功，实际 HTTPS 页面无对应错误。后续仍检查退出码与实际结果，不一概忽略警告，也不修改平台核心以消除此警告。

## 1. 在 Local 准备审核版本与清单

- 读取 `AGENTS.md`、当前任务记录和本文件；核对当前分支、Git 状态与远端差异，保留用户已有修改。
- 本地完成与改动相称的语法、渲染和交互检查，提供 Local 审核入口。已经通过的检查不因准备上线而无理由重复。
- 主动给出本轮部署清单：代码相对路径、媒体源文件与生产目标、必要的页面／metadata／options 操作；没有媒体或数据库步骤时明确写“无”。检查 CSS、JS、PHP include、图片、视频和分享图依赖，避免只传最近一次 diff 而遗漏首次上线所需文件。
- 固定批准版本及实际文件 SHA-256，记录代码提交。一个文件混有未批准修改时，先形成可审查的发布版本，不将整个工作区作为上传源。
- Codex 创建提交后立即推送当前 GitHub 分支。Git 推送只表示代码已保存，不能把它当作生产发布证据；推送失败必须说明。

## 2. 核对生产并保存备份

- 使用上方只读命令核对站点、环境和实际路径；确认活动主题与目标站一致。
- 按清单读取生产文件是否存在、大小、SHA-256 与权限，并与上次发布记录比较。若生产有独立改动，先核对并保留；不能用本地文件直接盖掉未知差异。
- 为本次发布新建私有备份目录：`C:\Users\Administrator\.ssh\athletik-deploy-backups\<日期-提交-批次>\`。保存被替换的原文件、需替换的旧媒体、相关数据库原值及 manifest；备份不放公开目录或 Git。
- manifest 至少包含站点、代码版本、源与目标路径、原来是否存在、原／新 SHA-256、大小、权限、备份路径和实际完成步骤。写入前再次核对原文件哈希，发现并发变化停止覆盖。
- 新建页面记录计划使用的路径／父子关系；修改现有页面或设置时先保留相关字段及 metadata／options 原值。文件备份不能代替数据库备份。

## 3. 按依赖顺序部署代码与媒体

- 只上传清单内的功能文件与必要依赖；内部文档、测试文件、私钥、备份及本地环境配置不上传生产。所有自定义代码仍限于子主题。
- 媒体单独传至 `/www/wp-content/uploads/myathletik-theme/assets/images/<category>/`，不放进主题，不因代码已推送就省略媒体传输。新增媒体先就绪，替换媒体先备份；不默认同步或删除整个 uploads 目录。
- 文件先传至对应目录的本次临时文件，校验字节数／哈希；PHP 在服务器执行语法检查，通过后再替换正式文件，并保留正确权限。
- 根据新旧代码兼容性安排激活顺序：先放兼容依赖，再启用引用它们的入口。首次 Showcase 的 `functions.php` 最后覆盖适用于该批次，不是所有发布的固定规则；模板、数据与函数互相依赖时，先确认每个中间状态可用。
- 每次替换记录实际结果。单文件替换不等于整批发布具有事务性；发生部分失败按下方回退流程处理。

Flywheel 官方部署路径支持 rsync；首次实际使用 SSH 下的一次性 PHP 标准输入传输及同目录临时文件替换，未上传额外部署接口，也未依赖未经验证的 SCP/SFTP 支持。后续先核实当前客户端与所选传输方式可用，再按清单执行。

首次 `.chrome-check/` 下的上传脚本和 manifest 是绑定 `021fbdf` 的单次发布工具，且不进入 Git；不能原样当作通用部署器。新批次必须使用新的文件清单、生产原值和备份，不复用旧校验值。

## 4. 执行本轮必要的 WordPress 操作

- 普通 PHP／CSS／JS 替换无须同步数据库。只有批准的新页面、metadata 或设置确需写入时，执行已审阅的精准操作，不导入整个 Local 数据库。
- 建页脚本应预检同名路径和归属、保持既有页面 ID／正文／自定义 SEO，并具备重复执行不增页的行为。记录本轮创建与修改的实际 ID；不把 Local ID 当生产 ID。
- 只清理本轮需要的页面／资源／Sitemap 缓存；不默认全库 search-replace、重建全部页面或改动核心／插件。
- Product Showcase 的具体建页命令与三页范围见[发布记录](../site/product-showcase-release-candidate-2026-11-03.md)。普通页面改动不重复运行 Showcase 发布脚本。

## 5. 验收正式 URL

- 文件：生产哈希匹配本轮发布源；媒体非空，实际 HTTP 响应、MIME 与大小正确；WordPress 可正常启动。
- 页面与功能：打开受影响的正式 URL，检查实际内容与关键入口；按本轮改动检查图片、视频播放／切换、筛选、弹窗等必要交互及桌面／手机布局。表单验收区分界面检查与真实提交，不因部署而自动发送测试询盘。
- SEO 相关变更使用 `wp-seo-audit`：核对状态码、H1、title／description、canonical、robots、Schema，以及有变化时的 Sitemap／站内链接。创建或修改 URL 仍遵守已批准的路由与 301 规则。
- 文件哈希、数据库记录、服务器发起的公开请求和外部浏览器是不同证据；挑战页、网络受阻或未完成检查记为限制，不能写成验收通过。Google 已请求索引、可索引、已收录分别记录。

## 6. 失败回退与收尾

- 本批变更引起页面不可用、PHP 错误、必要资源缺失或关键交互回归时，停止后续激活并定位本次已完成步骤；恢复本次备份，恢复顺序同样考虑依赖，随后复核实际页面。
- 回退前确认目标仍是本轮写入版本，保留并发新增的线上修改。仅清理可确认属于本次的临时文件；新增正式文件或页面不能一律删除，先核对引用和当前状态。数据库原值另行精准恢复，不用整库覆盖；涉及已经公开的 URL 撤销时遵守路由及重定向规则。
- 无法完整恢复时明确列出受影响 URL、已恢复与未恢复项，保留备份和证据，不把部分成功表述为完成。
- 更新任务发布记录与 `docs/progress.md`；发生网站修改时记录目标页面、搜索意图、证据、主要变量、风险、验收标准和 Finding outcome。SEO 任务继续使用现有 V2 Backlog，不另建平行执行清单。
- 记录只保存必要的非敏感摘要；原始备份／凭据不入 Git。Codex 的记录提交也立即推送当前分支，推送失败明确报告。
- 主动向所有者汇报：已部署的文件与媒体、数据库操作、可访问链接、验收结果、未完成项和提交／推送状态。若仅文档更新，明确“本次无需生产部署”。

### 每批发布记录模板

```text
日期 / 任务：
审核与上线授权：
目标页面 / 搜索意图：
证据 / 主要变量 / 风险 / 验收标准：
批准版本 / 分支 / 提交：
代码清单：
媒体清单与目标：
数据库操作（无则写无）：
生产预检 / 私有备份目录：
实际执行结果 / 回退情况：
HTTP / SEO / 浏览器验收与证据位置：
Finding outcome / 未完成项：
Git 提交与推送结果：
```

## 首次部署记录

- 网站代码提交：`021fbdf`。
- 更新原计划 5 文件，并补齐此前整包清单漏传的 `assets/js/product-showcase.js`、`assets/js/product-inquiry-context.js`，共 7 文件。
- 另外 8 个既有发布依赖与本地一致；部署后完整 15 文件全部逐字节匹配。20 个媒体均存在且非空。
- 本机备份：`C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-04-021fbdf-150326`，包含 3 个原文件及 manifest；另外 4 个文件部署前不存在。
- 公开 HTTP／SEO 与标准 Chrome 的筛选、图片、视频播放／切换及响应式检查通过。Cookiebot 遮挡和首页 Turnstile 独立错误的证据边界见完整发布记录，不将展示功能验收等同全站表单验收。
- 执行已批准的建页脚本，正式页面 ID 为 105／106／107；第二次执行无变化、无重复页面。详见[Product Showcase 发布记录](../site/product-showcase-release-candidate-2026-11-03.md)。

官方依据：[SSH key access](https://getflywheel.com/wordpress-support/ssh-key-access-and-management/)、[SSH 部署](https://getflywheel.com/wordpress-support/deploying-to-flywheel-via-ssh-and-github-actions/)。
