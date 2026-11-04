# Flywheel SSH 部署连接

日期：2026-11-04。状态：已连接并完成首次指定文件部署。

## 授权与连接

所有者明确要求建立 SSH 连接，并在 Flywheel 账号添加了本机部署公钥。本轮承接已批准的 Product Showcase 整包上线；连接可用不代表以后所有网站改动自动获准发布，仍按当前任务授权范围执行。

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

PowerShell 只读示例：

```powershell
& 'C:\Program Files\Git\usr\bin\ssh.exe' -T -F 'C:/Users/Administrator/.ssh/athletik-flywheel.conf' athletik-production 'wp option get home'
```

先确认规范域名和 `stylesheet=myathletik-child`，再执行任务内操作。Windows 系统 OpenSSH 在本轮非交互调用中出现 `GetConsoleMode on STD_INPUT_HANDLE failed with 6` 并未正常退出；Git OpenSSH 已验证正常。平台 WP-CLI 可能输出 `/www/.wordpress/` 的 `fileperms()` 警告；本轮命令返回成功，实际 HTTPS 页面无对应错误，不修改平台核心以消除此警告。

## 指定文件部署规则

1. 核对 Git 与用户已有修改；只部署已批准文件及必要依赖，不同步整个数据库。
2. 读取生产文件 SHA-256，与本地及上一已部署提交比较。发现独立线上改动时先处理差异，不能直接覆盖。
3. 原文件备份到本机 `.ssh/athletik-deploy-backups/`，记录原／新校验值与缺失文件，不把备份放到公开网站或 Git。
4. 新依赖先就绪；服务器端 PHP lint 后按文件替换，`functions.php` 最后。失败时恢复本次已覆盖文件；不移除无关文件。
5. 复核全部部署文件 SHA-256、WordPress 可启动、页面 HTTP 与必要交互；区分服务器请求、外部浏览器和数据库记录的证据。

SSH 网关的官方部署路径支持 rsync；本轮实际使用 SSH 下的一次性 PHP 标准输入传输及同目录临时文件替换，未上传额外部署接口，也未依赖未经验证的 SCP/SFTP 支持。

## 首次部署记录

- 网站代码提交：`021fbdf`。
- 更新原计划 5 文件，并补齐此前整包清单漏传的 `assets/js/product-showcase.js`、`assets/js/product-inquiry-context.js`，共 7 文件。
- 另外 8 个既有发布依赖与本地一致；部署后完整 15 文件全部逐字节匹配。20 个媒体均存在且非空。
- 本机备份：`C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-04-021fbdf-150326`，包含 3 个原文件及 manifest；另外 4 个文件部署前不存在。
- 公开 HTTP／SEO 与标准 Chrome 的筛选、图片、视频播放／切换及响应式检查通过。Cookiebot 遮挡和首页 Turnstile 独立错误的证据边界见完整发布记录，不将展示功能验收等同全站表单验收。
- 执行已批准的建页脚本，正式页面 ID 为 105／106／107；第二次执行无变化、无重复页面。详见[Product Showcase 发布记录](../site/product-showcase-release-candidate-2026-11-03.md)。

官方依据：[SSH key access](https://getflywheel.com/wordpress-support/ssh-key-access-and-management/)、[SSH 部署](https://getflywheel.com/wordpress-support/deploying-to-flywheel-via-ssh-and-github-actions/)。
