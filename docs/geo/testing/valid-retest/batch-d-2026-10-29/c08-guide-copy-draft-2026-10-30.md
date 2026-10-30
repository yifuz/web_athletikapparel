# C08 OEM 评估指南：两处英文增补草稿

日期：2026-10-30。状态：`owner-approved / locally-verified / deployment-pending`。目标页面为 [How to Evaluate a Vertically Integrated Knitwear OEM](https://www.athletikapparel.com/evaluate-technical-knitwear-oem/)，依据 [C08 证据与内容缺口核查](c08-guide-gap-audit-2026-10-30.md)。所有者已批准以下两段，已原样加入现有模板；本地验收完成，尚未部署生产。

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
- 所有者另问自身登记信息的可核验性：本次生产 Contact 确认已有英文中国实体名称和地址；在仓库项目文本范围未找到经确认的中文注册名、统一社会信用代码及对应公开授权。本次没有搜索私人邮件或全部附件，不代表公司无此资料。建议核实后集中在既有 Contact 展示，再考虑从指南连接；未添加未确认信息，未将英文名反推成中文法定名称。
