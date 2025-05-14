# zh-converter

## Overview

The `zh-converter` package provides a simple and efficient way to convert between simplified and traditional Chinese characters. It includes the `ZhConverter` class with methods for both conversion types.

`zh-converter` 工具包为简体中文与繁体中文之间的字符转换提供了一种简单高效的解决方案。它包含 `ZhConverter` 类，支持两种转换方向的相关方法。

## Installation

You can install the package via Composer. Run the following command in your terminal:

您可以通过 Composer 安装这个工具包。在终端中输入以下命令：

```
composer require vvvtool/zh-converter
```

## Usage

To use the `ZhConverter` class, include it in your PHP script:

要在您的 PHP 脚本中使用 `ZhConverter` 类，可按以下方式引入并操作：

```php
require 'vendor/autoload.php';

use VVVTool\ZhConverter\ZhConverter;

$converter = new ZhConverter();

// Convert to Traditional Chinese
$traditional = $converter->toTraditional('简体字');

// Convert to Simplified Chinese
$simplified = $converter->toSimplified('繁體字');
```

## Laravel Integration

If you're using Laravel, you can use the Facade for more convenient access:

如果您在使用 Laravel，可以通过 Facade 实现更便捷的访问：

```php
use VVVTool\ZhConverter\Laravel\Facades\Converter;

// Convert to Traditional Chinese
$traditional = Converter::toTraditional('简体字');

// Convert to Simplified Chinese
$simplified = Converter::toSimplified('繁體字');
```

## Contributing

We welcome contributions to the project! Please fork the repository and submit a pull request with your changes.

我们非常欢迎您为这个项目贡献力量！请 fork 我们的代码仓库，并提交包含您修改的 pull request。

## Acknowledgements

This project's dictionaries are based on [tongwen-dict](https://github.com/tongwentang/tongwen-dict). Thanks for their great work on maintaining the Chinese conversion dictionaries.

本项目的转换词典基于 [tongwen-dict](https://github.com/tongwentang/tongwen-dict) 项目。感谢他们在中文转换词典维护方面所做的杰出工作。

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

本项目遵循 MIT License 许可协议。详情请查看 LICENSE 文件。

