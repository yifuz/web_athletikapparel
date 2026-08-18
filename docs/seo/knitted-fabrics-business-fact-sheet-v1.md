# Knitted Fabrics 独立面料业务事实表 V1

> 建立日期：2026-08-18  
> 对应实施项：SEO-IMP-009  
> 目标页面：`/knitted-fabrics-manufacturer/`  
> 状态：等待所有者确认；确认前不修改页面 Meta、正文、规格栏或询盘表单

## 1. 目的与边界

本表用于确认 Athletik Clothing 是否能把 `/knitted-fabrics-manufacturer/` 作为独立面料采购入口，以及该页面应公开哪些 fabric-specific 商业规则。当前页面的 URL、Title 和 H1 与 `knitted fabric manufacturer` 搜索意图一致，不在本项中改变。

SEO-IMP-009 只处理以下事实：

- 是否承接独立面料订单；
- 面料 MOQ 与报价单位；
- 开发、打样、量产和交付流程；
- 面料买家询盘所需输入与表单路径。

GRS、追溯、测试报告、自有/关联/外协工序和具体性能声称属于 SEO-IMP-010。本表不把任何未确认能力或证书写成公开事实。

## 2. 当前页面错配

本地渲染页面目前仍由成衣品类共用模板输出：

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
| KF-09-01 | 是否接受不同时下成衣订单的独立面料采购？请填：`是`、`否`，或说明限制条件 | 【NEEDS INPUT】 |
| KF-09-02 | 面料 MOQ 按什么单位管理？例如 kg、meter、yard、roll；是否按每个颜色、针织结构、成分或后整理分别计算 | 【NEEDS INPUT】 |
| KF-09-03 | 可公开的 MOQ 数值或范围是什么？库存面料、定制纱线/颜色/后整理是否使用不同规则 | 【NEEDS INPUT】 |
| KF-09-04 | 报价使用什么价格单位？例如 per kg、per meter、per yard 或 per roll；币种和 Incoterm 是否按项目确认 | 【NEEDS INPUT】 |
| KF-09-05 | 报价前必须由买家提供哪些规格？请从 composition、yarn、knit structure、GSM、usable width、stretch/recovery、color/Pantone、finish/function、testing、quantity、application、delivery destination 中确认必填项 | 【NEEDS INPUT】 |
| KF-09-06 | 实际可提供哪些开发节点？请确认 swatch、counter sample、lab dip、sample yardage、approval sample，以及各自适用条件 | 【NEEDS INPUT】 |
| KF-09-07 | 可公开的样品/开发周期是什么？从收到完整规格、材料或颜色批准后的哪个节点开始计算 | 【NEEDS INPUT】 |
| KF-09-08 | 可公开的量产周期是什么？从样品、lab dip、订单或付款的哪个批准节点开始计算 | 【NEEDS INPUT】 |
| KF-09-09 | 常规交付形式和边界是什么？例如卷装、包装、数量/重量/幅宽公差、运输文件；哪些内容只能按项目确认 | 【NEEDS INPUT】 |
| KF-09-10 | 独立面料询盘应继续进入现有 Contact Form，还是建立单独的面料询盘分支/表单？ | 【NEEDS INPUT】 |

## 4. 确认后的页面落点

| 已确认事实 | 计划修改位置 |
|---|---|
| 独立面料订单为 `是` | 保留当前 URL、Title、H1 和商业页定位；在 Intro/CTA 中明确 fabric-only supply 边界 |
| 独立面料订单为 `否` | 停止把页面描述成独立供应入口；重新限定为成衣 OEM 项目的面料开发能力，并复核 Title/Meta 的搜索承诺 |
| fabric-specific MOQ 与报价单位 | 为 Knitted Fabrics 建立品类专用规格栏，不影响其余六个成衣品类的 `500 pcs per style` |
| 开发与交付节点 | 用真实面料流程替换 `style complexity` 和通用成衣 service 文案 |
| 报价必填规格 | 在页面 CTA 和面料询盘路径中列出最少输入，减少无法报价的低信息询盘 |
| 表单路径 | 保持 `Estimated Order Quantity` 的成衣含义；为面料数量和单位另设字段或独立分支，不混用 MOQ per style |

## 5. 实施与验收边界

收到所有者答案后再执行以下修改：

1. 仅为 Knitted Fabrics 增加品类级规格覆盖，不改变其他品类的共用成衣规格；
2. 根据独立供货结论调整必要的 Intro、采购信息和 CTA；
3. 表单中的成衣 `Estimated Order Quantity` 保持原义，面料数量使用明确的 fabric unit；
4. URL、Title、H1 默认保持不变；只有 KF-09-01 为“否”时才重新评估 Title/Meta，但不得无 301 改 URL；
5. 不在 SEO-IMP-009 中新增或扩大 GRS、测试、追溯、工艺所有权或产品性能声称；
6. 修改后验证 HTTP 200、唯一 H1、Canonical、Schema、桌面/移动布局和表单提交链路。
