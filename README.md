# zh-converter

[![Latest Stable Version](https://img.shields.io/packagist/v/vvvtool/zh-converter.svg)](https://packagist.org/packages/vvvtool/zh-converter)
[![Total Downloads](https://img.shields.io/packagist/dt/vvvtool/zh-converter.svg)](https://packagist.org/packages/vvvtool/zh-converter)
[![License](https://img.shields.io/packagist/l/vvvtool/zh-converter.svg)](https://packagist.org/packages/vvvtool/zh-converter)


## Overview

The `zh-converter` package is a powerful PHP library that provides comprehensive Chinese character conversion capabilities:

-   Simplified Chinese to Traditional Chinese (and vice versa)
-   Simplified Chinese to Hong Kong Traditional Chinese
-   Simplified Chinese to Taiwan Traditional Chinese
-   Support for converting between different Traditional Chinese variants

`zh-converter` 是一个功能强大的 PHP 工具包，提供全面的中文字符转换功能：

-   简体中文与繁体中文互转
-   简体中文转换为香港繁体中文
-   简体中文转换为台湾繁体中文
-   支持不同繁体中文变体之间的转换

## Installation

You can install the package via Composer:

通过 Composer 安装：

```bash
composer require vvvtool/zh-converter
```

## Usage

Below are some examples of how to use `ZhConverter`:

以下是一些如何使用 `ZhConverter` 的示例：

```php
require 'vendor/autoload.php';

use VVVTool\ZhConverter\ZhConverter;

// Convert Simplified to Traditional Chinese
$traditional = ZhConverter::s2t('简体转繁体');  // 簡體轉繁體

// Convert Traditional to Simplified Chinese
$simplified = ZhConverter::t2s('繁體轉簡體');   // 繁体转简体

// Convert Simplified to Hong Kong Traditional Chinese
$hkTraditional = ZhConverter::s2hk('计算机');   // 計算機

// Convert Simplified to Taiwan Traditional Chinese
$twTraditional = ZhConverter::s2tw('SQL注入攻击');     // SQL隱碼攻擊

// Convert Hong Kong Traditional to Simplified Chinese
$simplified = ZhConverter::hk2s('計算機');        // 计算机

// Convert Taiwan Traditional to Simplified Chinese
$simplified = ZhConverter::tw2s('SQL隱碼攻擊');        // SQL注入攻击
```

## Running Tests

To run the automated tests for this project, ensure you have installed the development dependencies:

要运行本项目的自动化测试，请确保您已安装开发依赖：

```bash
composer install --dev
```

Then, you can run the PHPUnit test suite:

然后，您可以运行 PHPUnit 测试：

```bash
./vendor/bin/phpunit
```

## Reporting Issues

If you encounter any bugs or have feature suggestions, please report them on the [GitHub Issues page](https://github.com/vvvtool/zh-converter/issues).

When reporting issues, please include:
- A clear and descriptive title.
- Steps to reproduce the bug.
- The version of `zh-converter` you are using.
- Your PHP version.
- Any relevant error messages or screenshots.

如果您遇到任何错误或有功能建议，请通过 [GitHub Issues 页面](https://github.com/vvvtool/zh-converter/issues) 进行报告。

报告问题时，请包括以下信息：
- 清晰的标题。
- 重现错误的步骤。
- 您正在使用的 `zh-converter` 版本。
- 您的 PHP 版本。
- 任何相关的错误信息或截图。

## Contributing

We welcome contributions to the project! Please fork the repository and submit a pull request with your changes.

我们非常欢迎您为这个项目贡献力量！请 fork 我们的代码仓库，并提交包含您修改的 pull request。

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

本项目遵循 MIT License 许可协议。详情请查看 LICENSE 文件。
