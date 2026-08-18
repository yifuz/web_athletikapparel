# Knitted Fabrics 独立面料业务事实表 V1

> 建立日期：2026-08-18  
> 对应实施项：SEO-IMP-009  
> 目标页面：`/knitted-fabrics-manufacturer/`  
> 所有者确认：2026-08-18
> 状态：本地页面已实施，待部署与生产验收

## 1. 目的与边界

本表用于确认 Athletik Clothing 是否能把 `/knitted-fabrics-manufacturer/` 作为独立面料采购入口，以及该页面应公开哪些 fabric-specific 商业规则。当前页面的 URL、Title 和 H1 与 `knitted fabric manufacturer` 搜索意图一致，不在本项中改变。

SEO-IMP-009 只处理以下事实：

- 是否承接独立面料订单；
- 面料 MOQ 与报价单位；
- 开发、打样、量产和交付流程；
- 面料买家询盘所需输入与表单路径。

GRS、追溯、测试报告、自有/关联/外协工序和具体性能声称属于 SEO-IMP-010。本表不把任何未确认能力或证书写成公开事实。

## 2. 实施前页面错配

实施前，本地渲染页面由成衣品类共用模板输出：

| 当前字段 | 当前输出 | 为什么不能直接用于独立面料采购 |
|---|---|---|
| MOQ | `500 pcs` / `Per style.` | `pieces per style` 是成衣单位，不能代表按颜色、结构、重量、长度或卷计算的面料 MOQ |
| Sampling | `1-2 weeks` | 文案以 `style complexity` 为条件，没有说明 swatch、lab dip、sample yardage 等面料开发节点 |
| Service | `OEM/ODM / full-package` | `designs, samples, or tech packs` 偏成衣项目，缺少面料规格和报价输入 |
| Contact 数量 | 全部使用 `pcs` | `Estimated Order Quantity` 是成衣订单量字段，不能替代面料询盘数量和单位 |

因此，成衣 MOQ 已降为每款 500 件这一事实不能自动换算或复制成面料 MOQ。

## 3. 所有者确认表

请在“所有者答案”一栏直接填写。没有固定数字时可以写“按项目确认”，但应补充决定条件。

| ID | 必须确认的问题 | 所有者答案 |
|---|---|---|
| KF-09-01 | 是否接受不同时下成衣订单的独立面料采购？请填：`是`、`否`，或说明限制条件 | 【是】 |
| KF-09-02 | 面料 MOQ 按什么单位管理？例如 kg、meter、yard、roll；是否按每个颜色、针织结构、成分或后整理分别计算 | 【正常起订为1000kg-3000kg，根据面料的成分和价格会有不同的起订量，无法定一个一致起订量。】 |
| KF-09-03 | 可公开的 MOQ 数值或范围是什么？库存面料、定制纱线/颜色/后整理是否使用不同规则 | 【如上所述，面料MOQ根据项目变化】 |
| KF-09-04 | 报价使用什么价格单位？例如 per kg、per meter、per yard 或 per roll；币种和 Incoterm 是否按项目确认 | 【正常来说per kg为主，但其他单位都可以接受，我们是服务商，这种换个计量单位的事情不是什么大问题】 |
| KF-09-05 | 报价前必须由买家提供哪些规格？请从 composition、yarn、knit structure、GSM、usable width、stretch/recovery、color/Pantone、finish/function、testing、quantity、application、delivery destination 中确认必填项 | 【以上都需要】 |
| KF-09-06 | 实际可提供哪些开发节点？请确认 swatch、counter sample、lab dip、sample yardage、approval sample，以及各自适用条件 | 【都可以提供】 |
| KF-09-07 | 可公开的样品/开发周期是什么？从收到完整规格、材料或颜色批准后的哪个节点开始计算 | 【先用目前业内常规数字】 |
| KF-09-08 | 可公开的量产周期是什么？从样品、lab dip、订单或付款的哪个批准节点开始计算 | 【先用目前业内常规数字】 |
| KF-09-09 | 常规交付形式和边界是什么？例如卷装、包装、数量/重量/幅宽公差、运输文件；哪些内容只能按项目确认 | 【先用目前业内常规数字】 |
| KF-09-10 | 独立面料询盘应继续进入现有 Contact Form，还是建立单独的面料询盘分支/表单？ | 【现有contact form就可以，可以添加面料选项，其他不需要改动】 |

## 4. B2B 面料网站语言参考与采用边界

本轮参考的是英文搜索结果中靠前且业务相关的面料 B2B 页面样本，不把搜索结果顺序视为固定排名，也不复制竞品文案或业务数字：

- [Fersan Tekstil](https://www.fersantekstil.com/en/)：在产品族页面直接给出 MOQ、交期以及样品/交付条件，并保留最终报价确认；
- [Pine Crest Fabrics](https://pinecrestfabrics.com/catalog/)：把 made-to-order、sample yardage、request a quote 和“minimums vary by fabric”放在同一采购路径中；
- [Apex Mills](https://www.apexmills.com/custom-solutions/)：以 custom-solutions questionnaire 收集结构、纤维成分和用途等开发输入；
- [Youchu Textile](https://www.youchutex.com/)：公开展示样品与量产周期，作为本轮周期区间的观察样本之一。

这些页面只用于提炼买家熟悉的表达结构：先说明供货范围，再说明典型 MOQ/周期，随后要求完整规格并把最终条件留在项目报价中。它们不能证明 Athletik 的实际能力、证书或交期。

所有者授权 KF-09-07 至 KF-09-09 暂用行业常规数字。当前本地页面采用较保守的临时区间：

- Development：`Typically 2-4 weeks`，从收到完整 fabric brief 后计算，实际受打样范围和批准轮次影响；
- Bulk lead time：`Typically 4-6 weeks`，从规格与颜色批准后计算，最终以项目报价为准；
- packing、delivery terms、单位切换和其他边界不写固定承诺，统一在项目报价中确认。

这两个周期不是搜索关键词，也不是无条件保证；后续取得 Athletik 实际项目数据后，应以内部真实中位数或范围替换。

## 5. 已实施的页面落点

| 已确认事实 | 本地实施 |
|---|---|
| 接受独立面料订单 | Hero kicker 使用 `Custom knit fabric development & supply`；Intro 以 `In addition to finished-garment manufacturing` 明确面料是补充业务，同时说明 standalone fabric orders；URL、Title、H1、Meta 不变 |
| MOQ 常见范围为 1,000–3,000 kg，按面料与项目变化 | Knitted Fabrics 使用品类专用规格卡 `Typically 1,000-3,000 kg`；其余六个成衣品类继续使用 `500 pcs per style` |
| 正常按 kg 报价，也可接受其他单位 | 正文使用 `Pricing is normally quoted per kg, while other units can be used when required.`，不锁定币种或 Incoterm |
| 必须取得完整面料规格 | 正文列出 composition、yarn/knit structure、GSM、usable width、stretch/recovery、color、finish/function、testing、quantity、application 和 destination |
| 可提供完整开发节点 | 正文列出 swatch、counter sample、lab dip、sample yardage 和 approval sample，并以 `as applicable` 限定具体项目 |
| 周期先用行业常规数字 | 规格卡分别使用 `Typically 2-4 weeks` 和 `Typically 4-6 weeks`，同时写明起算条件与 quotation 确认边界 |
| 继续使用现有 Contact Form | 表单已有 `Knitted Fabrics` 品类选项，因此不重复新增；不改变 `Estimated Order Quantity` 的成衣订单量含义，面料买家在 Message 中提供 kg 数量与完整规格 |

## 6. 实施与验收边界

本项按以下边界实施和验收：

1. 仅为 Knitted Fabrics 增加品类级规格覆盖，不改变其他品类的共用成衣规格；
2. 根据独立供货结论调整 Intro、采购信息和规格卡，不把面料业务扩成网站主要业务；
3. 表单中的成衣 `Estimated Order Quantity` 保持原义；现阶段不增加表单分支，由买家在 Message 中说明 fabric quantity/unit 与规格；
4. URL、Title、H1 和 Meta 保持不变；
5. 不在 SEO-IMP-009 中新增或扩大 GRS、测试、追溯、工艺所有权或产品性能声称；
6. 修改后验证 HTTP 200、唯一 H1、Canonical、Schema、桌面/移动布局和表单提交链路。
