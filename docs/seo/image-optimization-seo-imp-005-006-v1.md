# SEO-IMP-005 / SEO-IMP-006 图片优化实施记录 V1

> 执行日期：2026-08-17  
> 范围：`/sportswear-manufacturer/` 与 `/knitted-fabrics-manufacturer/` 的 9 张下滚产品图  
> 状态：本地已完成，待同步主题代码与 uploads 资源后进行生产验收

## 1. 实施结论

- 保留 9 张原始 PNG，作为不支持 WebP 时的回退资源和后续重新生成的无损源文件；
- 为每张图片生成 480、640、800、1024、1200 px，以及 1448 px 或 1800 px 最大尺寸，共 54 个 WebP；
- WebP 使用 RGB 真无损编码，而不是有损编码的 `quality=100`；缩放采用 Lanczos；
- 页面使用 `<picture>`、WebP `srcset`、准确的 `sizes` 和原 PNG `<img>` 回退；
- 9 张图片均补充固有 `width` / `height`、描述性 `alt`、`loading="lazy"` 与 `decoding="async"`；
- 图片均位于首屏以下，因此没有设置 `fetchpriority="high"` 或 preload，避免与真正的 LCP 资源争夺带宽；
- 未改变 URL、Title、H1、Meta、页面正文或关键词归属。

## 2. 资源位置与命名

真实文件目录：

```text
wp-content/uploads/myathletik-theme/assets/images/
```

图片不进入主题 Git 仓库。主题仍使用既有的 theme-relative URL，由 `functions.php` 的输出缓冲改写到 uploads。

| 页面 | 源图数 | WebP 命名模式 | 候选宽度 |
|---|---:|---|---|
| Sportswear | 4 | `sportswear/{training-tops,compression-leggings-shorts,yoga-studio-wear,running-singlets-layers}-<width>-lossless.webp` | 480 / 640 / 800 / 1024 / 1200 / 1448；compression 最大为 1800 |
| Knitted Fabrics | 5 | `knitted fabrics/{performance-knit-fabrics,thermal-knit-fabrics,functional-knit-fabrics,high-stretch-performance-knits,recycled-knit-fabrics}-<width>-lossless.webp` | 480 / 640 / 800 / 1024 / 1200 / 1448 |

## 3. 传输量结果

以下为每页 4 张或 5 张图片在同一候选宽度下的合计。浏览器会按视口宽度和 DPR 从 `srcset` 选择，不会同时下载全部候选。

| 页面 | 原 PNG 合计 | 480 px WebP | 640 px WebP | 800 px WebP | 1200 px WebP | 最大 WebP 合计 |
|---|---:|---:|---:|---:|---:|---:|
| Sportswear | 7,303,799 B | 461,548 B（-93.68%） | 821,384 B（-88.75%） | 1,293,066 B（-82.30%） | 2,934,060 B（-59.83%） | 4,413,808 B（-39.57%） |
| Knitted Fabrics | 12,025,937 B | 796,792 B（-93.37%） | 1,464,754 B（-87.82%） | 2,366,416 B（-80.32%） | 5,536,662 B（-53.96%） | 7,967,272 B（-33.75%） |

移动端常见选择将落在 480–800 px 区间；高 DPR 桌面设备可能选择 1024 或 1200 px。即使使用最大真无损 WebP，合计仍小于原 PNG。

## 4. 编码与质量验证

生成规则：

```text
scale=<width>:-2:flags=lanczos,format=bgra
libwebp + lossless=1 + quality=100 + compression_level=6 + pix_fmt=bgra
```

质量验证不是只读取编码参数，而是将 WebP 解码后，与源 PNG 按相同 Lanczos 规则缩放出的参考图做像素比较：

- 9 个最大尺寸 WebP 的 RGB PSNR 均为 `average:inf`；
- 说明编码阶段没有进一步丢失像素信息；
- 54 个文件均存在、尺寸与 `srcset` 描述符一致，且解码像素格式为 `argb`。

## 5. 页面与资源验收

本地页面验证结果：

| 检查项 | Sportswear | Knitted Fabrics |
|---|---:|---:|
| `<picture>` 数量 | 4 | 5 |
| WebP URL 数量 | 24 | 30 |
| 每图 `srcset` 候选 | 6 | 6 |
| WebP HTTP 状态 | 全部 200 | 全部 200 |
| PNG 回退 | 保留且可访问 | 保留且可访问 |
| 固有尺寸、alt、lazy、async | 全部存在 | 全部存在 |

本地 LocalWP Nginx 对新 WebP 返回 200，但当前本地静态 MIME 表没有输出 `Content-Type`。生产 Flywheel 对既有 WebP 已确认返回 `Content-Type: image/webp`；新资源上线后仍需逐项复核，不能只根据本地 200 判定 MIME 验收通过。

PHP 语法检查已通过：

- `inc/product-category-data.php`
- `template-parts/product-category/page.php`

## 6. 部署清单

1. 部署本次 child theme Git 变更；
2. 单独同步 uploads 中上述 54 个 `*-lossless.webp`，Git push 不会携带这些图片；
3. 在 staging/production 检查两页的 9 个 `<picture>`，确认 WebP 和 PNG 均返回 200 且 `Content-Type` 正确；
4. 用 390 px 和 1440 px 视口复核裁切、清晰度、交错布局和 CLS；
5. 在浏览器 Network 面板确认实际只请求匹配视口的候选，而不是原 PNG 或全部候选；
6. 部署稳定后记录日期，并比较 PageSpeed/Lighthouse 与 Search Console Core Web Vitals；样本不足时不把实验室分数变化直接视为排名变化。
