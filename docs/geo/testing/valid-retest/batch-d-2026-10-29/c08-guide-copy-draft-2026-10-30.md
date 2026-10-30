# C08 OEM 评估指南：两处英文增补草稿

日期：2026-10-30。状态：`owner-approved / production-verified / observation-pending`。目标页面为 [How to Evaluate a Vertically Integrated Knitwear OEM](https://www.athletikapparel.com/evaluate-technical-knitwear-oem/)，依据 [C08 证据与内容缺口核查](c08-guide-gap-audit-2026-10-30.md)。所有者已批准以下两段并确认部署；同日生产定向验收通过。该日期为部署确认和验收日期，不冒充精确部署时刻或搜索引擎重新抓取时间。

## 1. 企业登记核验

**插入位置：**第 2 节 `Verify the legal identity and operating location`，紧接现有要求索取主体名称、营业执照与地址的第一段之后。

> For a supplier registered in China, ask for its Chinese registered name and check the registration details through the National Enterprise Credit Information Publicity System. Compare the record with the business licence and clarify any differences. The [European Commission’s China IP Helpdesk guide](https://intellectual-property-helpdesk.ec.europa.eu/ip-management-and-resources/publications/how-search-basic-chinese-company-information-protect-your-ip_en) explains how to use the system. A registry check alone does not establish the actual production site or its manufacturing capability.

**来源与边界：**欧盟指南说明该系统可查询中国企业登记信息，并指向 `https://www.gsxt.gov.cn/`。本次直接访问公示系统首页返回 HTTP 521，无法验证本次访问路径下的查询流程；草稿链接使用可读取的欧盟指南，具体境外访问体验仍未知。登记查询不替代工厂现场核验；不据此推断签约授权、实际生产地点或能力。

## 2. 实验室及测试范围核验

**插入位置：**第 5 节 `Audit finished-fabric and lot control`，紧接现有要求取得面料报告并核对实际批量面料的末段之后。

> Review the report against your project requirements: the laboratory, sample or fabric lot, test method and version, and results. If the project requires an accredited laboratory, check with the relevant accreditation body that the laboratory is currently accredited and that the required test is within its scope. [ILAC explains how accreditation bodies list accredited laboratories and their scopes](https://ilac.org/ilac-mra-and-signatories/accredited-conformity-assessment-bodies/). Laboratory accreditation does not automatically certify a finished garment.

**来源与边界：**ILAC 说明认可机构维护已认可机构名单并颁发包含认可范围的证书。认可要求以项目为条件；草稿不声称 Athletik 或某个实验室已获认可，也不将特定产品或任何检测结果写为已获认证。

## 审核及后续

- 两段均为面向买家的核验建议，不改变现有产品、产能、认证或商务承诺，不增加新的测试数值或行业统一门槛。
- 两个拟用正文链接均于 2026-10-30 直接读取并返回 HTTP 200；不因此推断所有地区访问体验一致。
- 已将两段原样加入 `template-parts/technical-article/content-evaluate-technical-knitwear-oem.php` 的上述位置。PHP 语法、本地 HTTP 200、两个新增链接和两段单次渲染通过；390 / 1440px 无整页横向溢出，单一 H1，无页面 JS 错误；独立无头浏览器截图已复核，证据位于 `C:\Users\Administrator\seo-reports\c08-verification-2026-10-30\`。未操作所有者现有浏览器。
- 本地验收使用 LocalWP Apache `127.0.0.1:10008` 和本站 Host，绕过仅用于本次请求的环境代理；没有更改系统代理或服务。仅上述模板属于部署文件；上线后仍须独立验收，不以 Git 推送代替生产部署。
- 所有者明确纠正：关于自身登记信息的发问只是讨论指南写法，不是要求补充或公开企业资料。撤下此前提出的 Contact 资料补充建议，不作为待办，不再索取中文注册名或信用代码。指南提供通用核验方法本身成立，无证据支持为本次 GEO 增补而额外披露公司资料；继续仅推进已批准的两段。没有发布任何新增企业登记信息。

## 部署交付经过

- 所有者于 2026-10-30 明确批准部署，无需重复申请批准。本次检查的生产 URL 为 HTTP 200，第 2、5 节尚未出现两段新增正文；未将批准或 Git 推送记作部署完成。
- 当前会话没有可直接使用的 Flywheel / Local Connect / SFTP 部署连接，未操作所有者的浏览器或 Local GUI。已准备 `C:\Users\Administrator\Downloads\athletik-c08-approved-deploy-2026-10-30.zip`，ZIP 仅含 `template-parts/technical-article/content-evaluate-technical-knitwear-oem.php`；内容与批准实施提交 `dcb896d` 一致，解包校验通过。同目录 `athletik-c08-approved-deploy-2026-10-30-manifest.json` 记录文件及 ZIP 的 SHA-256。
- 实际目标为 `wp-content/themes/myathletik-child/template-parts/technical-article/content-evaluate-technical-knitwear-oem.php`。通过既有部署方式替换该文件，完成传输后再检查生产正文与链接及响应式显示。没有数据库、CSS 或 uploads 变更。

## 生产验收（2026-10-30）

- 所有者确认已部署后，生产 URL 返回 HTTP 200；第 2、5 节各新增一段，与批准稿和本地模板逐字一致，均仅出现一次。原始 HTML 已包含正文，不依赖浏览器执行脚本生成。
- Title、Meta description、H1 与项目规范一致，单一 H1、单一自引用 Canonical；robots 为 `follow, index`，未见 X-Robots-Tag。JSON-LD 可解析，Article 标题、作者与可见内容一致，四组 FAQ 问答与正文相符。原始 HTML 与浏览器渲染后的上述元信息一致。Schema 的 `dateModified` 仍为 `2026-08-11`；本次模板增补未同步 WordPress 日期，不将这个旧值作为本次内容仍未上线或搜索引擎已重新抓取的证据。
- 两个新增官方引用链接均返回 HTTP 200，最终 URL 与批准链接一致；Page Sitemap 和 Technical Guides Hub 均返回 200，分别包含目标 URL 与直接可抓取的指南入口。
- 独立无头浏览器在 360 / 390 / 1440px 验证，新增正文一致、无整页横向溢出或页面 JS 错误。已视觉查看新增内容与链接。360px 首次截图碰到 Cookiebot 关闭动画，该截图不作为验收依据；等待提示框隐藏后重拍的 `*-360-accepted.png` 通过。测试仅修改独立浏览器的同意状态，未操作所有者浏览器。
- 证据：`C:\Users\Administrator\seo-reports\c08-production-2026-10-30\` 下保存 `page.html`、`http-checks.json`、`browser-checks.json`、`link-checks.json` 及各尺寸截图。
- 本次只验收 C08 的已批准增补，不是全站、性能或搜索引擎重新抓取验收；未重新采样或请求索引，也未宣称已改善 AI 引用。
