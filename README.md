# zh-converter

[![Latest Stable Version](https://img.shields.io/packagist/v/vvvtool/zh-converter.svg)](https://packagist.org/packages/vvvtool/zh-converter)
[![Total Downloads](https://img.shields.io/packagist/dt/vvvtool/zh-converter.svg)](https://packagist.org/packages/vvvtool/zh-converter)
[![License](https://img.shields.io/packagist/l/vvvtool/zh-converter.svg)](https://packagist.org/packages/vvvtool/zh-converter)

## 简介

`zh-converter` 是一个功能强大的 PHP 中文转换工具，支持简体中文、繁体中文、台湾繁体、香港繁体之间的互相转换。主要特点：

- 支持简体中文与繁体中文的互相转换
- 支持简体中文转换为香港繁体中文
- 支持简体中文转换为台湾繁体中文
- 支持香港繁体、台湾繁体转换为简体中文
- 准确处理地区差异用词（例如：计算机/電腦/電子計算機）

## 安装

通过 Composer 安装：

```bash
composer require vvvtool/zh-converter
```

## 使用方法

以下是一些如何使用 `ZhConverter` 的示例：

```php
require 'vendor/autoload.php';

use VVVTool\ZhConverter\ZhConverter;

// 简体转繁体
$traditional = ZhConverter::s2t('简体转繁体');  // 簡體轉繁體

// 繁体转简体
$simplified = ZhConverter::t2s('繁體轉簡體');   // 繁体转简体

// 简体转香港繁体
$hkTraditional = ZhConverter::s2hk('计算机');   // 計算機

// 简体转台湾繁体
$twTraditional = ZhConverter::s2tw('SQL注入攻击');     // SQL隱碼攻擊

// 香港繁体转简体
$simplified = ZhConverter::hk2s('計算機');        // 计算机

// 台湾繁体转简体
$simplified = ZhConverter::tw2s('SQL隱碼攻擊');        // SQL注入攻击
```

## 单元测试

要运行本项目的单元测试，请确保您已安装开发依赖：

```bash
composer install --dev
```

然后，运行单元测试：

```bash
./vendor/bin/phpunit
```

## 问题反馈

如果您遇到任何错误或有功能建议，请通过 [GitHub Issues 页面](https://github.com/vvvtool/zh-converter/issues) 进行报告。

报告问题时，请包括以下信息：
- 清晰的问题描述。
- 问题重现步骤。
- 您正在使用的 `zh-converter` 版本。
- 您的 PHP 版本。
- 任何相关的错误信息或截图。

## 参与贡献

欢迎为项目贡献代码！请 fork 项目并提交 pull request。

## 开源协议

本项目遵循 MIT License 许可协议。详情请查看 LICENSE 文件。
