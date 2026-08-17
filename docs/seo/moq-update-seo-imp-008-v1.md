# SEO-IMP-008：MOQ 500 pieces per style 实施记录 V1

> 决策日期：2026-08-17
>
> 所有者确认：公开成衣 MOQ 从每款 1,000 件调整为每款 500 件
>
> 当前状态：本地代码与规范文档已同步，待 staging/production 部署和视觉验收

## 1. 业务口径

- 对外公开口径：`MOQ 500 pieces per style`。
- `per style` 是必要限定，不能简写成不带单位范围的“500 MOQ”。
- Fluent Forms 的 `Estimated Order Quantity` 是买家预计订单量，可能覆盖多个款式，不等同于 MOQ per style；本次不修改该字段的标签或档位。
- Knitted Fabrics 的采购单位和独立面料 MOQ 尚未确认。共享页面当前会显示成衣 MOQ，但该页的 fabric-specific 口径仍由 SEO-IMP-009 单独处理。

## 2. 网站实施

| 位置 | 实施 |
|---|---|
| `functions.php` | 以 `myathletik_public_moq_pieces()` 作为公开成衣 MOQ 的代码真值源，当前返回 `500` |
| Sportswear Hero | 在简介与 CTA 之间增加 `MOQ / 500 / pieces per style` 资格信息，value 与 unit 分离 |
| 产品类目规格栏 | 由同一函数输出 `500 pcs / Per style.`，避免各模板数字漂移 |
| 首页流程快照 | Bulk Production 同步为 `MOQ 500 pcs per style` |
| Services | Bulk Production 同步为 `orders from 500 pcs per style` |
| Contact / Fluent Forms | 不修改 `Estimated Order Quantity`，避免把总订单量误写为单款 MOQ |

本次没有修改 URL、slug、Title、H1、Meta、Canonical 或 Schema 类型。

## 3. 文档同步规则

- 当前规范、页面文案规格、营销计划、SEO 流程、搜索语言研究和 GEO 当前事实统一改为每款 500 件。
- 冻结的 GEO V1/V2 提示词及 2026-08-10 测试结果保留 1,000 件原文；如需验证新 MOQ 的供应商发现表现，建立新版本或新 ID。
- 只读页面审计保留 1,000 件实施前快照，并在文首增加状态更正。
- 第三方或历史来源中的 1,000 件不改写，包括竞品 MOQ 和 `docs/source-content/` 原始摘录。

## 4. 风险与验收

主要风险是把“每款最低起订量”和“预计订单总量”混为一谈，以及只修改某一页导致公开事实不一致。部署后需确认：

1. Sportswear 首屏在桌面和移动端均显示 `MOQ 500 pieces per style`，且不遮挡 CTA；
2. 首页、Services 和七个产品类目页不再输出旧的公开 1,000 件 MOQ；
3. Contact 表单继续使用原 `Estimated Order Quantity` 标签和档位；
4. 页面 Title、H1、Canonical、Schema 和现有 URL 保持不变；
5. staging/production 清除页面缓存后再做最终源代码和视觉检查。
