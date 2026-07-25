# Flywheel 服务器 27G 清理操作指引

> 生成时间:2026-07-24。本地素材迁移已完成(uploads 27G → 0.27G),
> 现在需清理 Flywheel 生产服务器上的 27G 旧素材。

## 背景
- 之前 LocalWP Local Connect push 把整个 uploads(27G)推上了 Flywheel。
- 本地已瘦身:218 个文件 / 0.27G(网站引用的素材)+ D 盘素材库 26.38G(备用)。
- Local Connect 不支持排除 uploads 子目录,所以必须手动清理服务器。

---

## 操作步骤(方案 B:删后重传)

### 第 1 步:在 Flywheel 面板删除服务器旧素材

1. 登录 Flywheel 面板 → 进入站点(athletik clothing official-site)。
2. 打开 **Advanced / SFTP** 或 **File Manager**(Flywheel 面板里的文件管理)。
3. 导航到:`app/public/wp-content/uploads/`
4. **删除整个 `myathletik-theme/` 文件夹**(这是 27G 的全部来源)。
   - ⚠️ 只删 `myathletik-theme/`,**不要删 uploads 下其他内容**
     (`2026/`、`rank-math/` 等保留)。
5. 确认删除后,Flywheel storage 应立即大幅下降。

### 第 2 步:上传本地瘦身后的素材

打包好的 zip 已在:
```
D:\C-网站素材\myathletik-theme-upload-to-flywheel.zip   (270 MB)
```
内含 218 个文件,结构:`myathletik-theme/assets/images/<分类>/<文件>`。

**上传方式(任选其一):**

- **方式 1(Flywheel 面板文件管理器)**:若面板支持 zip 上传 + 解压,
  上传 zip 到 `app/public/wp-content/uploads/`,解压,确认
  `uploads/myathletik-theme/assets/images/` 结构正确。
- **方式 2(SFTP)**:用 Flywheel 提供的 SFTP 账号连接,把 zip 上传到
  `uploads/` 后在服务器端解压(SSH 终端 `unzip`),或本地解压后用
  SFTP 客户端(FileZilla/WinSCP)把整个 `myathletik-theme/` 文件夹拖上去。
- **方式 3(最简单:Local Connect pull 一次,再 push)**:
  不推荐 —— Local Connect 会把本地现在的 0.27G 推上去,但旧 27G
  的残留文件它不会删(push 不删服务器独有文件)。所以仍需第 1 步先删。

### 第 3 步:验证

1. 浏览器访问 https://www.athletikapparel.com/
2. 检查首页:hero 图、client logo 跑马灯、产品分类卡片图、style-gallery。
3. 抽查几个分类页:
   - https://www.athletikapparel.com/merino-wool-manufacturer/(gallery 图)
   - https://www.athletikapparel.com/underwear-manufacturer/
   - https://www.athletikapparel.com/about-us/(hero 用了中文 png)
4. 打开浏览器开发者工具 → Network → 筛选 Img,确认无 404(红条)。
5. Flywheel 面板确认 storage 已降到 ~300MB 级别。

---

## 要删的服务器路径(精确)

```
app/public/wp-content/uploads/myathletik-theme/    ← 整个文件夹,27G 全在这里
```

**保留**:
```
app/public/wp-content/uploads/2026/        ← Rank Math 等,保留
app/public/wp-content/uploads/rank-math/   ← 保留
app/public/wp-content/uploads/其他任何非 myathletik-theme 的内容
```

## 要重传的内容

打包好的 zip(270MB):
```
D:\C-网站素材\myathletik-theme-upload-to-flywheel.zip
```
解压后结构应为:
```
myathletik-theme/
└── assets/
    └── images/
        ├── audit&certificates/     (10)
        ├── brand-partner/          (93, logo 跑马灯)
        ├── knitted fabrics/        (10)
        ├── merino wool product/    (16)
        ├── outdoor clothing/       (11)
        ├── production/             (6)
        ├── silkwear/               (22)
        ├── sports accessories/     (7)
        ├── sportswear/             (15)
        ├── sustainable/            (5)
        ├── underwear/              (14)
        └── 辅图/                   (9)
```
共 218 个文件,0.27G。

---

## 风险与回滚
- 删除前可在 Flywheel 面板点 **Create Backup**(一键备份点),万无一失。
- 本地 D 盘素材库 26.38G 是完整备份,任何文件都能找回。
- 若重传后页面 404:先检查服务器 `uploads/myathletik-theme/assets/images/`
  目录结构是否完整(分类文件夹名要带空格/中文的原样)。

## 本地相关脚本(参考)
- `tools/plan_asset_move.py` — 生成 keep/move 清单
- `tools/exec_asset_move.py` — 执行迁移(已跑完)
- `tools/move_plan_KEEP.txt` — 保留的 218 个文件清单
- `tools/move_plan_MOVE.txt` — 搬走的 4446 个文件清单
- `tools/audit_image_refs.py` / `audit_all_refs.py` — 引用完整性审计
