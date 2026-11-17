# 买家公开证据补查：Open Supply Hub（2026-11-17）

状态：`deployed / production-verified`。所有者审核并授权的 Asda 与 New Balance 公开记录已通过原有 SSH 密钥部署，普通正式网址验收通过；先前 SSH 故障与备用密钥拒绝记录保留为历史，部署与验收结果见第 7 节。

## 1. 已核实的工厂档案

[Open Supply Hub 工厂档案](https://opensupplyhub.org/facilities/CN2021314PF2M92)的名称为 `Zhangjiagang Athletik Clothing Co. Ltd`，地址为 `No. 15, Zhongxing Road Yangshe Town Zhangjiagang`，与已确认的中国生产实体名称和 15 号地址匹配；OS ID 为 `CN2021314PF2M92`。档案显示尚未认领，本次没有认领、注册、编辑或提交资料。

隔离无头浏览器从公开界面搜索并打开该档案；使用两家买家各自官网给出的 Open Supply Hub 贡献者筛选入口，分别搜索实体名称，两次返回 HTTP 200、1 个匹配项，均为上述 OS ID。2026-11-02 通过匿名 API 和旧工作簿未取得 New Balance 列名的[历史结论](buyer-disclosures-expansion-2026-11-02.md)属于当时访问范围，本次通过公开界面取得了新结果。

| 来源 | 本次页面可见的事实 | 表述边界 |
|---|---|---|
| [New Balance 官网政策页](https://www.newbalance.com/policies.html) → [其 OS Hub 名单筛选](https://opensupplyhub.org/facilities?contributors=10959&q=Zhangjiagang%20Athletik) | 工厂档案的 All Data Sources 显示 New Balance 通过列表提供 `New Balance Licensee Supplier List Q1-2026`，日期显示 2026-03-09。New Balance 官网称通过 OS Hub 披露包括 Licensee 在内的供应商。 | 只支持 **2026 年第一季度授权商供应链名单中有该工厂列名**；不是 New Balance 直接 Tier 1 合同、当前订单、指定产品、授权商身份或品牌背书的证明。页面日期按平台显示保留，不把它擅自写成订单日期。 |
| [Asda 官网采购透明页](https://corporate.asda.com/responsible-sourcing) → [其 OS Hub 名单筛选](https://opensupplyhub.org/facilities?contributors=5209&q=Zhangjiagang%20Athletik) | 同一档案显示 Asda 通过名为 `Asda` 的列表贡献数据，页面日期为 2026-10-22；档案的产品类别和工厂类型字段也显示 Asda 为来源。 | 只支持 Asda 公开贡献的日期化工厂数据；10-22 为平台所显示的列表贡献日期，不擅自改写为订单、审计或合作开始日期，也不推断合同或目前订单状态。 |
| [Asda 历史 PDF](https://asdasupplier.com/file-download/Tier%201%20Food%20NEG%20Produce%20and%20GM%20facilities_1.pdf) | 原文载明名单最后更新于 2022 年 6 月，含同名实体与 15 号地址。 | 历史资料，不能代替 2026 OS Hub 数据或证明持续合作；不作为当前名单引用。 |

OS Hub 的贡献者数据并非对名单所涉事实的全面独立审计；实际业务关系、项目和当前状态仍以相关原始证据为准。两家各自官网对 OS Hub 的使用只说明披露入口，不保证任何特定订单或表现。引用前还应确认用户希望公开哪些信息，不能仅因他站已公开就自动新增品牌、客户案例或披露更多内部字段。

## 2. 引用前的资料范围

同一 OS Hub 档案同时显示工厂信息及第三方认证记录。WRAP 的一条历史记录显示有效期为 2024-01-16 至 2025-01-16，状态为 `inactive`；该条记录不能单独证明公司目前是否持有其他有效证书。官网首页现将 WRAP 图标归入有范围及有效期说明的项目参考；引用 OS Hub 档案前，应将该历史记录与最新可核验凭据区分，不能把旧记录直接当成当前证书状态，也不能将档案中的全部字段搬到官网。

完整公开档案和买家名单面板的本次文字快照、隔离浏览器截图保存在 Git 忽略目录 `.chrome-check/geo-osh-profile-20261117.txt`、`.chrome-check/geo-osh-identity-20261117.png` 与 `.chrome-check/geo-osh-asda-nb-20261117.png`；它们是当日动态页面快照，不是可长期保证不变的来源。匿名 API 的独立请求返回 401；本次实际结果来自网站正常公开搜索界面，不声称取得 API 凭据或下载完整名单。

## 3. 来源核查时的下一步与备选方向

**当时优先，后续已完成：** 在不新增商业秘密的前提下，将 Asda 与 New Balance 的日期化公开列名作为官网既有买家披露的候选补充，提供可审核的准确表达、来源和披露范围。New Balance 的 `Licensee` 口径予以保留；后续审核与发布见第 4～7 节。

**备选：** 以已批准且已上线的 97 个面料料号、成分和 GSM 为素材，研究对采购者有用的技术选型内容，并与现有面料库和成衣示例核对，避免重复或推导未公开的结构、用途、测试结果和库存状态；材料属于第一方证据，不当作独立背书。另一方向是基于现有技术指南和公开标准梳理项目测试选择，须逐条核验官方适用范围与现行版本，不根据标准编号冒称本公司实验室资质或测试结果。

C07 比较保留 `deferred / no-comparable-physical-sample`；该决定不表示公司没有其他面料或成衣材料。后续有同面料样本及公开许可再重启，外观示范与性能测试仍应分开。本次没有运行 AI 复测，不推断这些资料已被 AI 引用或会带来推荐。

## 4. 2026-11-17 Local 审核版

所有者在了解两条公开记录的拟用位置、日期范围、来源入口与 OS Hub 档案可见范围后说“开始做”。按讨论方案实施：

- About Us 的 `Public supplier disclosures` 在原两项之后新增 Asda 和 New Balance 两项。Asda 写 OS Hub 所显示的 2026 年 10 月数据；New Balance 明确保留 `Licensee Supplier List Q1-2026`。每项分别链接买家对应的 OS Hub 筛选结果，目标仅展示匹配工厂入口，继续点击可进入完整公开档案。
- Sportswear 的 `Buyer-published supplier lists` 补一句两项新记录，并增加跳到 About 完整名单的站内链接；原两份 PDF 入口、四张证据卡及不把名单当作特定订单或背书的说明均保留。
- 官网不复制 OS Hub 中的员工、认证或其他附带字段；来源可通向该平台自己的完整档案，不能限制第三方展示。本次没有认领档案、修改第三方资料或披露订单信息。

预备上线清单只有两个代码文件：`page-about-us.php` 和 `template-parts/product-category/sportswear-evidence.php`。使用现有布局与样式；无新增媒体、数据库操作、URL、Title、meta、H1 或 Schema 改动。当时为 Local 审核状态；后续授权与部署尝试见下，Git 未推送。

定向验证：

1. 两个 PHP 文件均通过 Local PHP 8.2.35 语法检查。About 与 Sportswear 的修改前后比较显示 Title、description、canonical、robots、H1、JSON-LD 以及目标区块以外的正文和链接保持一致；Underwear 对照同样一致。
2. 隔离 Chrome 在 1440、1024、768、390、360、320px 检查两页：About 四条记录和来源链接可见，Sportswear 四张卡、六个链接完整，无横向溢出。Sportswear 新入口通过键盘聚焦与 Enter 实际到达 About 对应标题；新来源链接可键盘聚焦。桌面与手机截图已目视检查。
3. 其他六个品类页均 HTTP 200、单一 H1，未显示 Sportswear 新证据区。两项 OS Hub 筛选入口经隔离浏览器分别返回 HTTP 200、各 1 条匹配 `CN2021314PF2M92`；档案来源面板仍显示 New Balance Q1-2026 列表及 Asda 2026-10-22 数据。

结果见 `.chrome-check/geo-osh-local-html-20261117.json`、`.chrome-check/geo-osh-local-qa-20261117.json`、`.chrome-check/geo-osh-source-qa-20261117.json`，截图为 `.chrome-check/geo-osh-{about,sportswear}-{1440,390}-20261117.png`。这些文件仅用于本地验证，不进入部署清单。所有者随后已审核并授权部署，实际尝试见下。

## 5. 2026-11-17 部署已获授权，SSH 站点会话受阻

本节为当时的受阻记录；后续连接和部署结果见第 7 节。

- 所有者确认“审核完成 运行部署”，授权发布审核版 `5175129` 的 `page-about-us.php` 与 `template-parts/product-category/sportswear-evidence.php`；无需媒体或数据库操作。该授权仍有效，连接恢复后直接续做，不再重复询问。
- 发布前正式首页、About 与七品类普通访问均 HTTP 200、单一 H1 和各自 canonical；已保存部署前公开基线。首页、About 和 Sportswear 的随机查询参数请求也均 HTTP 200，返回 `MISS, MISS` / Cloudflare `DYNAMIC`。普通 About 与 Sportswear 目前仍为不含 Asda / New Balance 新记录的旧版。
- Flywheel SSH 网关接受既有公钥，账号站点列表中也显示目标站；但进入该站点执行只读 `wp option get home` 或 `pwd` 均未完成，最终返回 `We're having trouble connecting to your site`。参考号 `1fb8ab90-f499-4038-b623-d6b298d8d77b`。经网关交互选择相同站点后，55 秒内仍停留在连接中；以 DNS 查询获得的公网地址直接尝试亦未在 28 秒内完成。不能据此认定全部 Flywheel 站点故障或推断原因。
- 已在私有目录 `C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-17-5175129-geo-20261117T142537` 冻结两份批准版本与公开基线，并记录待比对的旧版本哈希；这不是生产文件备份。因未进入生产，尚不能验证站点环境与远程文件哈希，也未取得原文件、上传、修改缓存或数据库。两处正式页面因此尚未进入本批生产验收。
- 恢复条件：Flywheel 网关能够进入目标站点并完成只读预检。恢复后按[SSH 工作流程](../../operations/flywheel-ssh-deployment.md)核对 home、stylesheet、production、主题与 uploads 路径；备份两份生产原文件并核对其与 `5175129^` 的哈希，确认无并发改动后按审核范围上传、验收和记录。若生产文件与基线不同，先核对并保留差异，不覆盖未知修改。

## 6. 备用 SSH 密钥尝试

本节记录部署前的密钥尝试；旧密钥后来恢复站点连接，见第 7 节。

所有者说明 Flywheel 客服需要一段时间，并要求创建新密钥尝试。已生成独立 Ed25519 备用密钥及独立配置 `C:\Users\Administrator\.ssh\athletik-flywheel-alt-20261117.conf`，保留原有密钥、配置及主机校验；新私钥 ACL 仅当前用户和 SYSTEM 可访问。公钥指纹 `SHA256:Phz+YcpUJyTCdteMcjm06iUAAe0il3Ch8AAW2bh5e/g`。新配置已核实只选择备用私钥；添加前网关返回 `Permission denied (publickey)`，表示 Flywheel 尚未登记该新公钥。

当时约定所有者添加备用公钥后，使用备用配置测试网关认证和进入目标站点；若会话恢复，按原授权完成预检、生产原文件备份、两文件部署和验收。原密钥先前已经通过认证，不能预设换钥能修复站点会话；本轮未修改生产或其他浏览器窗口。

所有者随后确认“已经添加”。用独立配置对网关及目标站点复测，服务器仍返回 `Permission denied (publickey)`；同一测试通过正常 DNS 路径及直接解析的 Flywheel 地址得到相同结果。已确认配置仅选择备用密钥、私钥与所给公钥匹配，指纹仍为上述值。该结果只说明网关当时未接受该密钥，不推断所有者未添加、添加错误或具体原因。

原密钥同轮仍能通过网关认证并列出本站，但目标站点只读会话在 30 秒内未建立。生产文件未备份或上传，部署授权仍有效；应结合先前 Flywheel 参考号让支持人员检查站点会话及新公钥认证，恢复后直接继续预检、备份、部署与验收。

所有者提供 Flywheel 客服建议：核对公钥、私钥匹配并使用 `ssh -i` 显式指定。已再次从私钥导出公钥并与交给所有者的公钥逐项比对，一致；使用临时空配置、`IdentitiesOnly=yes`、`IdentityAgent=none` 和 `-i` 分别测试网关及目标站，日志确认客户端确实只提供备用密钥，但服务器均返回 `Permission denied (publickey)`。使用相同隔离方式显式指定原密钥时，认证成功，目标站点会话在 50 秒内仍未建立。未读取所有者浏览器或 Flywheel 账户，因此不能判断后台保存内容或服务端拒绝原因。以上是两个不同环节的观测，需客服继续排查；生产未写入。

所有者要求重连后再次复测（本地时间 2026-11-17T15:02:22+08:00）：备用密钥连接站点与网关均返回 `Permission denied (publickey)`；原密钥通过认证，但站点会话在 50 秒内仍未建立。未验证客服是否已完成同步，因此不把结果归因为同步成功或失败。生产未写入，继续等待 Flywheel 排查，部署授权保持有效。

所有者提供的 Flywheel 客服回复确认：客服已尝试重新同步 SSH 用户，但问题仍在，现已提交工单 `15523783` 给高级工程师，后续将通过邮件联系；客服表示现有日志未显示确切 SSH 错误。工单编号不同于此前网关返回的参考号 `1fb8ab90-f499-4038-b623-d6b298d8d77b`。等待客服后续结果，恢复后继续已批准的生产预检、备份、部署和验收。

## 7. 2026-11-17 生产部署与验收

- 所有者要求再次连接；原有密钥已能进入生产站点，备用密钥当次仍返回 `Permission denied (publickey)`。生产预检核对 `home`、活动子主题、`production` 环境及主题、uploads 路径均符合部署工作流程；不能据此判断 Flywheel 故障根因或工单 `15523783` 已关闭。
- 按已批准版本 `5175129` 部署 `page-about-us.php` 与 `template-parts/product-category/sportswear-evidence.php`；无媒体、数据库或 URL 改动。两份生产原文件已按哈希保存到本机私有备份目录 `C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-17-5175129-geo-20261117T142537`，完整 manifest 与哈希同目录保存。
- 生产 About 原文件的混合换行使字节哈希不同；换行规范化后与审核前版本完全一致。发布文件保留线上每一行原有换行字节，仅插入已批准的 10 行内容；规范化后与审核版一致。Sportswear 原文件与预期哈希完全一致。两份临时文件经服务器 PHP 语法检查后激活；最终生产哈希、大小、权限与所属用户／组核对通过，生产侧临时回退文件已按哈希验证清理，本机原文件备份保留。
- 所有者刷新 Flywheel 缓存后，普通 About 和 Sportswear 正式网址从本机和生产服务器出口均 HTTP 200 且显示 Asda 与 New Balance。About 显示四项名单及各自来源；Sportswear 保留四张卡、六个链接和 `Licensee Supplier List Q1-2026` 范围。键盘焦点、Enter 跳转 About 对应标题、两项 OS Hub 链接地址均通过。
- 隔离无头 Chrome 检查 1440、1024、768、390、320px，两页无横向溢出；桌面和手机截图已目视检查。其他六个品类页均 HTTP 200、单一 H1、未出现 Sportswear 证据区。两页 Title、description、canonical、robots、H1、JSON-LD 与部署前基线一致；基线中少数文字存在替换字符，这些片段按通配符比较，Title 另与 `seo-tags.md` 精确核对。
- 验收记录为 `.chrome-check/geo-osh-production-qa-20261117.json`、`.chrome-check/geo-osh-production-seo-20261117.json` 和 `.chrome-check/geo-osh-live-{about,sportswear}-{1440,390}-20261117.png`；仅本地保存，不上传生产。Finding outcome：`changed / keep / measuring`。此次未进行 AI 复测，不据页面上线推断已被索引、引用或推荐。Git 文档记录保留本地提交，未推送。
