<?php

use PHPUnit\Framework\TestCase;
use VVVTool\ZhConverter\ZhConverter;

class ZhConverterTest extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        $this->converter = new ZhConverter();
    }

    public function testConvertToTraditional()
    {
        $this->assertEquals('繁體字', $this->converter->toTraditional('繁体字'));
        $this->assertEquals('中文', $this->converter->toTraditional('中文'));
        $this->assertEquals('乾綱', $this->converter->toTraditional('乾纲'));
        $this->assertEquals('入口網站', $this->converter->toTraditional('门户网站'));
    }

    public function testConvertToSimplified()
    {
        $this->assertEquals('简体字', $this->converter->toSimplified('簡體字'));
        $this->assertEquals('中文', $this->converter->toSimplified('中文'));
        $this->assertEquals('乾纲', $this->converter->toSimplified('乾綱'));
        $this->assertEquals('门户网站', $this->converter->toSimplified('入口網站'));
    }
}