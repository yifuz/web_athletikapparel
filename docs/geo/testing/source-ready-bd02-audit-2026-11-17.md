# BD-02 第三方资料核查：SourceReady（2026-11-17）

状态：`research-complete / owner-sent / awaiting-response`。本次由 Codex 只读核查并准备草稿；所有者随后确认已向 SourceReady 发送请求，具体发送内容和渠道未单独核实，平台回复及公开更正仍待确认。Codex 未登录、认领、付费、修改第三方档案或联系平台，也未修改任何网站。

## 1. 核查范围与结论

所有者 11-16 手动提供的 [BD-02 来源清单](valid-retest/manual-2026-11-16/README.md#bd-02所有者提供的来源清单)包括 Junhao 的 [SourceReady 页面](https://www.sourceready.com/supplier/detail/dongguan-junhao-sportswear-co-ltd)、两家供应商的 Alibaba 页面及一家 Made-in-China 页面。来源面板中的条目不自动等于已核实的正文引用；本次未重新采样 AI 回答，也未证明 Athletik 档案被该次回答使用。

同一平台已有 [Zhangjiagang Athletik Clothing Co., Ltd. 档案](https://www.sourceready.com/supplier/detail/zhangjiagang-athletik-clothing)：匿名 GET 返回 HTTP 200，H1 为中国实体名称，正文写明 Zhangjiagang、技术针织和 FLATLOCK / ACTIVESEAM，公开数据还列 `athletik.com.cn` 为参考来源。公司名称、所在地、业务和来源组合支持该档案对应本公司中国生产实体；这不是企业登记证明。

本次对 Alibaba / Made-in-China 的公开搜索未找到可核对的同名中国主体资料；搜索结果有覆盖和索引限制，不能据此断言没有档案，也不据此启动建档或购买服务。历史平台决策继续遵循[站外机会池](../../seo/authority/offsite-authority-opportunity-pool-v1.md)中较新的适用状态。

## 2. 已核实的事实差异

| 项目 | 本次观察 | 判断和边界 |
|---|---|---|
| 门牌 | SourceReady 页面 HTML 的 `Organization` JSON-LD 和 `__NEXT_DATA__` 中，公司地址为 `No.25, Zhongxing Road`。 | 所有者已确认正确地址是 **No.15**，且[规范站 Contact](https://www.athletikapparel.com/contact/)显示 No.15。25 号位于机器可读数据，并非本次在普通可见联系栏中读到的地址；不能据此声称 AI 已使用它。 |
| 可能的上游 | SourceReady 将 `athletik.com.cn` 列为参考之一；该[中国站首页](https://athletik.com.cn/)当前仍显示 No.25。 | 两处同时保留旧值，可能增加信息不一致的持续性；无法证明该站是 SourceReady 的唯一数据源，也不知道该站在本项目中的修改权限。中国站仍在使用，不将其当作退役域名。 |
| 官网入口 | SourceReady 的该主体 JSON-LD `url` 为 `https://athletik.com.cn`；本次匿名取得的 HTML 与公开数据字段中未出现 `athletikapparel.com`。 | 中国站是真实仍在使用的站点，不将其称为无效。规范站缺席于本次公开响应，未检查需登录或付费解锁的字段；不能声称平台数据库绝对没有主站。可请平台说明能否**增加**主站，不默认删除现有中国站。 |
| 客户表述 | 档案正文以较宽泛的语言提及 New Balance。 | 已核实的买家来源只支持工厂列于 `New Balance Licensee Supplier List Q1-2026`，不单凭聚合页面推断直接合同或当前订单；第三方表述本身不等于已证伪。 |
| 认证与审核 | 档案列出多个项目；公开数据的六个认证字段均标记 `verified: false`，没有在这些字段中提供可核验的有效期或范围。 | 这是该次响应中的平台字段，不代表证书无效或过期。当前有效性、法律实体、设施及产品范围需各自凭据核验；不把目录标签直接当作独立证明。 |

SourceReady 自称使用公开目录、网站、数据商与 AI 丰富资料，详见其[数据来源说明](https://help.sourceready.com/en/articles/9542745-understanding-sourceready-s-supplier-data-sources)。因此它有 GEO 发现价值，但不是买家发布名单，也不是对上述断言的独立审计；不把它加入官网的 buyer-published supplier disclosures。

搜索工具的历史缓存曾在一页户外服装名单中显示该实体；本次直接读取该页返回 HTTP 200，却未看到该实体。名单可能变化或因访问路径不同而不同，不将历史缓存写成当前稳定在列或排名证据。

匿名响应中的非敏感字段快照为 `.chrome-check/geo-bd02-sourceready-evidence-20261117.json`；只保存可公开的主体、地址、来源域名存在性和平台字段状态，不保存隐藏的联系人、客户明细或原始整页。

## 3. 可行处理路径

最有价值的是解决同一实体的公开地址不一致，并提高规范站与该实体的关联准确度：可核实中国站是否有可用的修改权限和安排，并让 SourceReady 评估把公开档案和 JSON-LD 的地址更正为 No.15、增加规范站入口，同时按证据范围复核客户与认证表述。所有者于 11-17 确认已发送请求，等待平台回复；未确认实际发送文字与下方草稿完全一致。Codex 未联系平台或修改中国站，也不要求关闭或重定向中国站。

SourceReady 的[帮助文档](https://help.sourceready.com/en/articles/9526604-edit-and-delete-supplier)说明，用户在 `My suppliers` 中编辑只影响自己的列表，不会修改公开搜索数据。其[数据来源说明](https://help.sourceready.com/en/articles/9542745-understanding-sourceready-s-supplier-data-sources)称供应商可提交或更新资料，但本次未发现可验证的公开档案认领流程或费用说明；可通过[官方支持入口](https://www.sourceready.com/contact)询问，不应假设注册、付费或修改私有列表即可解决。

## 4. 最小更正请求草稿（发送前准备，实际发送内容未核实）

仅使用已公开的实体、地址与网址，不附客户清单、证书或其他非公开资料。

**Subject:** Request to correct an existing supplier profile

Hello SourceReady team,

We would like to ask how an authorized representative can correct the following public supplier profile:

https://www.sourceready.com/supplier/detail/zhangjiagang-athletik-clothing

The profile's structured address currently says No.25, Zhongxing Road. Our correct address is No.15, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu 215699, China, as shown on our official contact page: https://www.athletikapparel.com/contact/

Could you also advise whether our main website, https://www.athletikapparel.com/, can be added alongside the existing `athletik.com.cn` website? The latter remains in use.

Please let us know what verification is required, whether corrections appear on the public profile and related search listings, and whether any fees apply. We would prefer to review any request for additional documents before sharing them.

Thank you.

## 5. 后续验证

所有者已确认发送，等待平台回复；不能将发送等同于平台受理或完成更正。只有平台实际确认公开更正并完成后，才重新检查普通页面、初始 HTML、JSON-LD 的名称／门牌／网址及公开搜索入口，并记录数据来源和时间；不能把发出请求、账户内私有列表编辑或买方名单列名当作 AI 引用或推荐。
