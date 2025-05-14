<?php

use PHPUnit\Framework\TestCase;
use VVVTool\ZhConverter\ZhConverter;

class ZhConverterTest extends TestCase
{

    protected function setUp(): void
    {

    }

    public function testConvertToTraditional()
    {
        $this->assertEquals('繁體字', ZHConverter::toTraditional('繁体字'));
        $this->assertEquals('中文', ZHConverter::toTraditional('中文'));
        $this->assertEquals('乾綱', ZHConverter::toTraditional('乾纲'));
        $this->assertEquals('入口網站', ZHConverter::toTraditional('门户网站'));
        $this->assertEquals('入口網站', ZHConverter::toTraditional('入口網站'));
    }

    public function testConvertToSimplified()
    {
        $this->assertEquals('简体字', ZHConverter::toSimplified('簡體字'));
        $this->assertEquals('中文', ZHConverter::toSimplified('中文'));
        $this->assertEquals('乾纲', ZHConverter::toSimplified('乾綱'));
        $this->assertEquals('门户网站', ZHConverter::toSimplified('入口網站'));
        $this->assertEquals('门户网站', ZHConverter::toSimplified('门户网站'));
    }
}