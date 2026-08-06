# 隐私与同意管理上线操作清单

> 日期：2026-08-04
> 状态：Cookiebot、Consent Mode、拒绝/允许/撤回流程、Privacy Policy 与主题改动均已完成生产部署和验证
> 生产站：<https://www.athletikapparel.com/>

## 1. Cookiebot 账户（需要账户持有人完成）

1. [x] 使用 `zhangyifuzjg@gmail.com` 在 <https://admin.cookiebot.com/> 创建账户。
2. 只添加正式域名 `www.athletikapparel.com`。
   - 不要把 `athletikapparel.com` 再作为第二个域名单独添加。
   - 不要把 `.local` 本地域名添加到免费账户。
3. [x] 2026-08-04 首次扫描完成；当前 7 个 tracker 均已分类，没有 Unclassified。
   仍需在报告详情中核对实际扫描页数是否低于免费档上限。
4. 将默认语言设为 English。
5. 首轮配置建议对所有访问者使用明确的 opt-in：必要类别始终开启，Preferences、
   Statistics 和 Marketing 默认关闭；接受、拒绝和自定义选择应同等清晰。
6. 不在 Cookiebot 中启用 Google Consent Mode；Google Consent Mode 统一交给 Site Kit。
7. [x] Domain Group ID / CBID：`f81cac53-c468-4afd-9823-7adcc4839c5b`。
8. [x] 保存全访客 Explicit Consent、非必要类别默认关闭、English 内容、无关闭图标，
   并启用浮动 Privacy Trigger。

只需提供 CBID，不要把 Cookiebot 或 Gmail 密码、恢复码、验证码写入项目文件或聊天记录。

## 2. 关闭生产站 AdSense

1. 登录生产站 WordPress 管理后台。
2. 打开 `Site Kit → Settings → Connected Services → AdSense → Edit`。
3. 关闭 `Let Site Kit place AdSense code on your site`，并断开 AdSense 服务。
4. 不要断开 `Ads` 或 `Analytics`；AdSense 是展示广告发布商产品，Ads 是后续 Google Ads
   搜索推广所需模块，两者不同。
5. 清除生产缓存后，用未登录窗口检查网页源代码。
6. 验收标准：不再出现
   `pagead2.googlesyndication.com/pagead/js/adsbygoogle.js`。

完成记录：2026-08-04 已从生产 Site Kit 断开 AdSense；未登录并绕缓存复查确认
AdSense 脚本和 `pagead2.googlesyndication.com` 引用均为 0。

## 3. 生产站安装与连接

2026-08-04 断开 AdSense 后复查：生产首页仍未加载 Cookiebot、WP Consent API
或 Site Kit Consent Mode。以下步骤尚未执行。

1. [x] 安装并启用 `WP Consent API` 2.0.1；公开页面复查确认脚本已输出。
2. [x] 安装并启用 `Cookiebot by Usercentrics`。
3. [x] 在 Cookiebot 插件中填写 CBID，选择自动阻断模式；公开源码验证通过。
4. [x] 关闭 Cookiebot 的 Google Consent Mode；公开源码确认默认 GCM 输出为 0。
5. [x] 在 `Site Kit → Settings → Admin Settings` 中启用 Consent Mode；公开源码确认
   Site Kit 默认 consent 配置只输出一次。
6. [x] Site Kit 后台已检测到 WP Consent API；Cookiebot 由公开源码确认已连接并输出。
   Site Kit 对 CMP 卡片只显示通用兼容性提示，不单独确认插件名称。
7. 在 Privacy Policy 的 Cookies 章节插入 `[cookie_declaration]`。
8. 完成 Privacy Policy 审核并发布；页脚 Privacy Policy 链接会在页面发布后自动显示。
9. 增加并验证 `Cookie Settings` 入口，让访客可以重新打开 Cookiebot 设置。

## 4. 当前本地状态

- WP Consent API 2.0.1：已安装并启用。
- Cookiebot 4.7.2：已安装并启用，CBID 已设置。
- Cookiebot 自带 Google Consent Mode：已关闭。
- Cookiebot 前端横幅：使用 Auto blocking 脚本注入；已在生产域名验证横幅和同意交互。
- Privacy Policy 页面 ID 3：结构化英文美国首轮版本，已部署生产并验证公开访问。
- 页脚 Privacy Policy：按发布状态显示，已在生产环境验证自动显示。
- 页脚 Cookie Settings：已部署生产，通过 Cookiebot API 重新打开设置。
- UTM/GCLID 归因：只有 `marketing` 允许时写入；拒绝或撤回时删除。

## 5. 最终验收

- [x] 全新无 Cookie Chrome 配置访问首页时出现正确横幅。
- [x] 1440px 桌面显示底部 Bar；390px 移动视口显示响应式 Dialog，无横向溢出。
- [ ] Sportswear 落地页和 Contact 页的新访客横幅显示正常。
- [x] 首次访问未选择前，非必要类别保持拒绝。
- [x] Allow all 后 `statistics` / `marketing` 与四个 Google consent 信号正确更新。
- [x] Reject all 后非必要类别和 Google consent 信号保持拒绝。
- [ ] 拒绝后不写入 UTM/GCLID `sessionStorage`。
- [ ] 接受后跨页面保留允许的 UTM/GCLID 数据。
- [ ] 撤回 marketing 后立即删除归因存储和表单隐藏字段。
- [ ] 四个 Google Consent Mode v2 信号在 Google Tag Assistant 中正确变化。
- [ ] Contact 表单提交、询盘邮件和 `generate_lead` 不重复且不报错。
- [x] AdSense 脚本已从生产 HTML 移除。
- [x] 生产页脚 Cookie Settings 已部署并验证；Cookiebot Privacy Trigger 保留为备用入口。
      已验证访客可重新打开设置，且 Allow all 后执行 Withdraw consent 会撤回全部非必要类别。
- [ ] 当前扫描的 Preferences 与 Marketing tracker 数量均为 0；接入 Google Ads 并重新扫描后，
      验证只允许 Statistics、拒绝 Marketing 的部分同意流程。
- [ ] Privacy Policy、Cookie Declaration、实际网络请求和 CMP 分类一致。
