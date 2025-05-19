# zh-converter

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

## Contributing

We welcome contributions to the project! Please fork the repository and submit a pull request with your changes.

我们非常欢迎您为这个项目贡献力量！请 fork 我们的代码仓库，并提交包含您修改的 pull request。

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

本项目遵循 MIT License 许可协议。详情请查看 LICENSE 文件。
