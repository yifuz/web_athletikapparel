# UltraMerino 与 Athletik 规范 Merino 页面冲突审计（2026-09-14）

> 审计对象：`https://www.ultramerino.com/` 与 `https://www.athletikapparel.com/merino-wool-manufacturer/`
>
> 对应行动：`GEO-V2-008`
>
> 审计性质：只读；本轮未修改、合并、Canonical 或重定向任何域名

> 2026-09-14 所有者补充：UltraMerino 等同方站点中的机器数量、员工数字、产能和已发布认证范围可作为当前一方事实使用；对外产能统一采用 `100,000+ pieces per month`。当前项目不负责 UltraMerino 页面修改，以下原审计中的“待盘点/待确认”结论以本补充为准；未提供的 Merrow/HSAT 台数与具体型号仍不推断。

## 1. 结论

`ultramerino.com` 不是只存在于 AI 或搜索缓存中的历史站。2026-09-14 的实时检查确认：

- 首页和主要能力页均返回 HTTP 200；
- `robots.txt` 允许普通抓取，并声明 `sitemap.xml`；
- Sitemap 含 41 个 URL；
- 核心页面均为自引用 Canonical，未设置 `noindex`；
- 站内 JSON-LD、页面标题、H1 和正文持续把站点表达为 Merino wool thermal underwear manufacturer；
- ChatGPT 的 V2-D05 已实际采用该站，公开搜索也仍能发现其页面。

因此，AI 在 Merino wool base layer + industrial FLATLOCK 问题中优先选择 UltraMerino，有明确的页面级原因：它对产品、ISO 607、Yamato、OEM/ODM 和中国生产主体的字面匹配比规范站更密集。问题不是“AI 无故引用旧缓存”，而是两个仍可索引站点正在提供重叠但不完全一致的第一方事实。

所有者已确认 UltraMerino 为同方控制的 Merino 专业站，但该站当前不由本项目负责。因此本审计不建议由主站项目执行跨域 Canonical、301 或外站页面修改；主站只采用经所有者确认且与当前口径一致的事实。

## 2. 当前技术状态

| 检查项 | 结果 | GEO 含义 |
|---|---|---|
| HTTP | 首页、Products、Production、Special Stitching、Equipment 均为 200 | 页面可被抓取和引用 |
| Robots | 允许全站抓取，仅屏蔽 `/wp-admin/`；声明 XML 与 RSS Sitemap | 没有发现抓取层阻断 |
| XML Sitemap | 41 个 URL | 产品、面料、设备和归档页均向搜索系统主动提交 |
| Canonical | 五个抽查页全部自引用 | UltraMerino 明确要求被当作独立规范来源，不会自动让位于 Athletik 主站 |
| Meta robots | `max-image-preview:large`，无 `noindex` | 页面具备索引资格 |
| JSON-LD | 核心页均有 `Organization`、`WebSite`、`WebPage` 与 `BreadcrumbList` | 有结构化实体信号，但 Organization 名称使用通用关键词而非稳定品牌或完整法律主体 |
| H1 | 首页 2 个；Products 4 个；Production 3 个；Special Stitching 2 个；Equipment 3 个 | 页面主题层级不清晰，增加机器提取噪声 |
| 更新时间 | 页面 Schema 的修改时间主要停留在 2024，首页为 2025-04；Sitemap 抽查 URL 的 `lastmod` 统一为 2024-08-22 | 页面仍可用，但更新和 Sitemap 新鲜度信号不一致 |
| 主站关系 | 五个抽查页均未引用 `athletikapparel.com` | 双站不会直接传递角色说明；AI 会自行根据名称和内容推断关系 |

技术判断：UltraMerino 当前不是“被动遗留站”，而是一个主动声明自身为规范来源的可索引专业站。

## 3. AI 为什么在 V2-D05 中选择 UltraMerino

| 检索需要 | UltraMerino 的直接表达 | Athletik 规范页当前表达 | 影响 |
|---|---|---|---|
| Merino base layer manufacturer | Title、Description、导航和正文反复出现 Merino underwear / thermal wear / base layer | 当前页覆盖 Merino base layers、underwear、mid-layers 和 accessories | 两站都匹配，UltraMerino 关键词更集中 |
| 工业 FLATLOCK | Products 写 `Full flatlock Stitching`，Special Stitching 直接写 ISO 607 与 Yamato | 规范页写 `FLATLOCK or ACTIVESEAM where appropriate` | UltraMerino 对 D05 的字面匹配更强，但边界更容易过度承诺 |
| OEM/ODM | Products 将 Merino base layer 与 ODM / OEM / full package 放在同一列表 | 规范页把 Merino 纳入完整 OEM/ODM 项目 | 两站都支持，UltraMerino 更短、更易摘录 |
| 中国制造主体 | 页头和 Production 直接显示 Zhangjiagang Athletik Clothing Co., Limited | 规范站以 Athletik Clothing 公开品牌为主，并在 About/页脚说明地址 | UltraMerino 更容易被模型连接到中国制造实体 |
| 设备证据 | Equipment 和 Special Stitching 单独列 Yamato、Merrow、HSAT-K5 等设备 | 规范站可采用所有者确认的机器数量、员工数字和设备类型 | UltraMerino 更像设备证明页；主站需要补足相同事实，同时继续限制无法核验的绝对措辞 |

这解释了当前结果：Google AI Mode 已能直接引用 Athletik 规范 Merino 页面，而 ChatGPT 仍会选择 UltraMerino 的更细、更直接页面。它不是单纯的技术 SEO 问题，而是来源选择和事实治理问题。

## 4. 需要同步或降级的声明

| UltraMerino 当前声明 | 规范站/当前业务口径 | 风险 | 建议 |
|---|---|---|---|
| `MOQ: 1000 pcs per style per fabric` | 公开成衣 MOQ 为 `500 pieces per style`；面料、颜色、尺码和最终条款按项目确认 | 明确商业事实冲突；AI 可能继续输出 1,000 MOQ | 改为当前 500 pieces/style，并保留项目报价边界；不要写成每色承诺 |
| 首页先写 `more than 120,000 pcs per month`，随后又写 `100,000 pcs per month` | 规范站为 `100,000+ pieces per month` | 同一页面内部冲突，且与主站口径不一致 | 统一为 100,000+；如要使用更高数字，先取得当前产能证据和适用范围 |
| `more than 30 Yamato`、`around 100 sewing workers` | 所有者确认为可公开的当前一方事实 | 与规范站原有保守口径不同，但不再属于未确认冲突 | 主站可使用；Merrow/HSAT 未提供台数或型号时只写设备类型和用途 |
| `Full flatlock Stitching`、`All Japan made Yamato...` | `FLATLOCK or ACTIVESEAM where appropriate / as specified` | 把可选工艺泛化为全品类、全款式能力；`All` 难以持续证明 | 改成按款式、面料和 seam map 指定；只有具体样品页可写实际采用的接缝 |
| `Woolmark licensed factory` | 所有者确认已发布认证范围有效 | 仍属于主体、范围和有效期敏感事实 | 可以在对应有效范围内引用；面向具体订单时仍提供适用主体、范围和有效期文件 |
| `16-19.5 micron fine merino wool available` 与 `Genuine Australian merino wool` | 规范页按 buyer specification 选择 micron、composition、GSM 和结构 | 容易被 AI 解释为所有订单的固定范围或唯一来源地 | 改成可按项目开发的材料选项，并要求原料来源和认证随项目文件确认 |
| `best merino wool yarn from the best manufacturers in China` | 技术、具体、可验证的品牌语气 | 无可审计比较标准 | 删除 `best`，改为按经批准规格和可追溯文件采购 |
| 测试后 `guarantee in shrinkage, spirality etc.` | 测试结果应绑定面料、测试方法、阈值和 approved sample | 无条件性能保证，法律和交付风险较高 | 改为按 agreed test methods and acceptance criteria 检查，不做笼统保证 |
| 为 `client who has no designer` 提供设计服务 | 目标客户为 established/mid-sized B2B buyers，支持 tech pack、sketch 或 reference sample | 容易把专业制造伙伴重新定位为低门槛创业服务 | 改为 development support from tech packs, sketches or reference samples |

上述处理不是为了把 UltraMerino 写成 Athletik 主站的复制页，而是让同一经营体系的公开事实不互相矛盾。

## 5. 双站任务边界

### Athletik 规范站

- 承接跨品类的 full-package OEM/ODM 采购；
- 解释 Merino 如何与 underwear、outdoor clothing、sports accessories、technical seams、testing 和 export workflow 组合；
- 保持当前 `500 pieces per style`、`100,000+ pieces/month` 和条件式技术能力口径；
- 作为 Athletik Clothing 公开品牌与公司整体能力的规范来源。

### UltraMerino 专业站

- 深入覆盖 Merino wool garment / fabric 的产品结构、材料选择、micron、GSM、knit structure、testing 和具体样品；
- 设备或工艺页只发布有当前盘点、实拍、型号或样品支持的证据；
- 维持独立 URL 与自引用 Canonical，避免复制 Athletik 页面的 Hero、FAQ、Program Fit 或整段文案；
- MOQ 与产能按当前业务口径统一；已确认的员工、设备数量和认证范围可保留，未经确认的具体型号、设备台数及绝对性能承诺不公开。

双站同时争取排名并不要求两边重复同一套文字。相反，越清楚地区分“综合 OEM/ODM 采购入口”和“Merino 专业技术库”，越容易降低近义页面竞争和 AI 事实拼接错误。

## 6. 建议执行顺序

### P0：事实同步

1. 首页把 MOQ、产能统一到当前核准口径。
2. 保留已确认的机器和员工数字；未提供的台数或型号不推断。`All`、`Full`、`best` 和 `guarantee` 仍需改为有适用条件的事实表达。
3. Woolmark 及其他认证可按所有者确认的有效范围引用；具体订单继续核对许可主体、编号、范围和有效期。
4. 将 Organization Schema 的名称从通用关键词改为清晰、稳定且与可见页面一致的站点/运营主体表达；具体名称需由所有者批准。

### P1：结构和来源质量

1. 核心页面统一为一个 H1，重写重复的 Title/Description。
2. 清理或改写 `/187-2/`、`/200-2/`、`/213-2/`、`/218-2/` 等不具描述性的 URL 页面；若改 URL，必须逐条 301。
3. 修正 `meirno`、`jerey`、`jersery`、`camourflage`、`jacquar` 等 Sitemap URL 拼写问题；已索引 URL 只能通过旧到新的 301 迁移。
4. 为核心技术页增加可见的 reviewed/updated 日期，并使 Sitemap `lastmod` 反映真实内容更新。
5. 从 UltraMerino 自身的 GSC/Bing 属性核实有效索引、查询、链接和 AI 引用；当前 Athletik 主站数据不能代替该域名的数据。

### P2：双站来源归属测试

1. 修订部署并完成抓取后，用相同 V2-D05 Prompt 在全新 Temporary Chat 中复测。
2. 分别记录 Athletik 主站与 UltraMerino 的引用 URL、支持的具体声明和短名单位置。
3. 成功标准不是强制只有主站被引用，而是两个站均不再输出冲突事实，且来源与页面任务匹配。

## 7. 本轮完成与未完成

已完成：所有权与双站意图核对、HTTP/robots/Sitemap/Canonical/索引资格抽查、核心页面结构、AI 实际采用来源和关键冲突声明审计。

尚未完成：UltraMerino 自身的 GSC/Bing 数据、反向链接和外部站点实际修改。该站当前不由本项目负责；这些数据不能从 Athletik 主站推导，也不再作为主站优化的前置条件。

## 8. Finding outcome

`GEO-V2-008` 状态：`complete / remediation-required`。

下一行动：UltraMerino 事实同步保持 `deferred / outside-project-control`；执行 `GEO-V2-019`，把经确认的事实、设备证据和真实更新时间补到 Athletik 规范站，再进行 D03/D05 复测。
