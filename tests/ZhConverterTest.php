<?php

use PHPUnit\Framework\TestCase;
use VVVTool\ZhConverter\ZhConverter;

class ZhConverterTest extends TestCase
{
    protected function setUp(): void
    {
    }

    public function testSimplifiedToTraditional()
    {
        // 测试简体到繁体的转换
        $this->assertEquals('繁體字', ZhConverter::s2t('繁体字'));
        $this->assertEquals('後面', ZhConverter::s2t('后面'));
        $this->assertEquals('乾綱', ZhConverter::s2t('乾纲'));
        $this->assertEquals('臺灣', ZhConverter::s2t('台湾'));
    }

    public function testTraditionalToSimplified()
    {
        // 测试繁体到简体的转换
        $this->assertEquals('繁体字', ZhConverter::t2s('繁體字'));
        $this->assertEquals('后面', ZhConverter::t2s('後面'));
        $this->assertEquals('乾纲', ZhConverter::t2s('乾綱'));
        $this->assertEquals('台湾', ZhConverter::t2s('臺灣'));
        $this->assertEquals('繁体转简体', ZhConverter::t2s('繁體轉簡體'));
    }

    public function testSimplifiedToHongKong()
    {
        // 测试简体到香港繁体的转换
        $this->assertEquals('計算機', ZhConverter::s2hk('计算机'));
        $this->assertEquals('軟件', ZhConverter::s2hk('软件'));
        $this->assertEquals('網絡', ZhConverter::s2hk('网络'));
        $this->assertEquals('信息', ZhConverter::s2hk('信息'));
    }

    public function testSimplifiedToTaiwan()
    {
        // 测试简体到台湾繁体的转换
        $this->assertEquals('SQL隱碼攻擊', ZhConverter::s2tw('SQL注入攻击'));
        $this->assertEquals('物件導向', ZhConverter::s2tw('面向对象'));
        $this->assertEquals('網路', ZhConverter::s2tw('网络'));
        $this->assertEquals('資訊', ZhConverter::s2tw('信息'));
    }

    public function testHongKongToSimplified()
    {
        // 测试香港繁体到简体的转换
        $this->assertEquals('计算机', ZhConverter::hk2s('計算機'));
        $this->assertEquals('软件', ZhConverter::hk2s('軟件'));
        $this->assertEquals('网络', ZhConverter::hk2s('網絡'));
        $this->assertEquals('信息', ZhConverter::hk2s('信息'));
    }

    public function testTaiwanToSimplified()
    {
        // 测试台湾繁体到简体的转换
        $this->assertEquals('SQL注入攻击', ZhConverter::tw2s('SQL隱碼攻擊'));
        $this->assertEquals('面向对象', ZhConverter::tw2s('物件導向'));
        $this->assertEquals('网络', ZhConverter::tw2s('網路'));
        $this->assertEquals('信息', ZhConverter::tw2s('資訊'));
    }

    public function testSpecialCases()
    {
        // 测试特殊情况
        $this->assertEquals('', ZhConverter::s2t(''));  // 空字符串
        $this->assertEquals('ABC123', ZhConverter::s2t('ABC123'));  // 非中文字符
        $this->assertEquals('你好,世界123', ZhConverter::s2t('你好,世界123'));  // 混合字符
    }
}
