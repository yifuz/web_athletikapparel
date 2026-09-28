# SEO CLI 与 Clash Verge 代理适配

状态：2026-09-28 已实施并验证。适用于本机 `seo` CLI `0.2.36` 在 Clash Verge 系统代理开启时出现 `INTERNAL_ERROR / fetch failed` 或 `UND_ERR_CONNECT_TIMEOUT` 的情况。

## 问题与原因

- Windows 系统代理已由 Clash Verge 设置为 `127.0.0.1:7897`，代理监听正常。
- 浏览器和显式指定代理的 `curl` 可以访问 Google API，但当前 `seo` CLI 自带的 Undici 不会仅因 Windows 系统代理或 Node `--use-env-proxy` 自动采用该代理。
- 因此故障是 CLI 到 Google API 的出站链路问题，不是 GSC/GA4 授权失效，也不能据此判断站点或数据异常。

## 已实施的本机入口

- 命令：`seo-clash`
- 脚本：`C:\Users\Administrator\AppData\Local\hermes\node\seo-clash.ps1`
- 原始 `seo` 命令、OAuth 文件、Windows 代理、VS Code 设置和用户/机器环境变量均未修改。
- 脚本只为当前子进程设置 `HTTP_PROXY`、`HTTPS_PROXY`、`NO_PROXY` 和 Undici 的 `EnvHttpProxyAgent`，命令结束后恢复进程环境。
- 默认读取当前启用的 Windows HTTP/HTTPS 代理；如需临时覆盖，可在当前 PowerShell 会话设置 `$env:SEO_PROXY_URL`。

实现依据：Undici 官方文档中的 [`EnvHttpProxyAgent`](https://github.com/nodejs/undici/blob/main/docs/docs/api/EnvHttpProxyAgent.md) 与 [`ProxyAgent`](https://github.com/nodejs/undici/blob/main/docs/docs/api/ProxyAgent.md)。

## 使用方式

Clash Verge 已启动且系统代理开启时，用 `seo-clash` 代替 `seo`：

```powershell
seo-clash --version
seo-clash sites --json
seo-clash url-inspect `
  --site 'sc-domain:athletikapparel.com' `
  --url 'https://www.athletikapparel.com/' `
  --json
```

临时指定另一代理端口：

```powershell
$env:SEO_PROXY_URL = 'http://127.0.0.1:7897'
seo-clash sites --json
Remove-Item Env:SEO_PROXY_URL
```

## 验证与停止条件

本次已验证：

- `seo-clash --version` 返回 `0.2.36`；
- `seo-clash sites --json` 返回 `sc-domain:athletikapparel.com`，权限为 `siteOwner`；
- GSC URL Inspection、Search Analytics 与 GA4 Reporting 均能取得实时结果。

若脚本提示本地端口没有监听，先检查 Clash Verge 是否运行以及系统代理端口是否变化，不要反复重做 OAuth。若不再使用 Clash 或直连已恢复，可继续使用原始 `seo` 命令；不要把本脚本写入全局代理或 VS Code 持久配置。
