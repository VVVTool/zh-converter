<?php

namespace VVVTool\ZhConverter;

class ZhConverter
{
    private static $dictionaries = [];
    private static $isLoaded = false;
    private static $maxLen = 20; // 最大词组长度

    private static function loadDictionary(string $name): array
    {
        $dictFile = __DIR__ . "/../dicts/{$name}.json";

        return self::loadJsonFile($dictFile);
    }

    private static function loadJsonFile(string $file): array
    {
        if (!file_exists($file)) {
            return [];
        }

        $dict = json_decode(file_get_contents($file), true) ?: [];

        // 更新最大长度
        if (!empty($dict)) {
            $maxKeyLength = max(array_map('mb_strlen', array_keys($dict)));
            self::$maxLen = max(self::$maxLen, $maxKeyLength);
        }

        return $dict;
    }

    public static function convert(string $text, array $dictionary): string
    {
        if (empty($text)) {
            return '';
        }

        $result = '';
        $buffer = '';
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $totalLen = count($chars);

        $i = 0;

        while ($i < $totalLen) {
            // 填充缓冲区
            $buffer = '';
            $j = 0;
            while ($j < self::$maxLen && ($i + $j) < $totalLen) {
                $buffer .= $chars[$i + $j];
                $j++;
            }

            // 尝试最长匹配
            $matched = false;
            $bufferLen = mb_strlen($buffer);

            for ($len = $bufferLen; $len > 0; $len--) {
                $slice = mb_substr($buffer, 0, $len);
                if (isset($dictionary[$slice])) {
                    $result .= $dictionary[$slice];
                    $i += $len;
                    $matched = true;
                    break;
                }
            }

            // 如果没有匹配到，则转换单字
            if (!$matched) {
                $char = $chars[$i];
                $result .= $dictionary[$char] ?? $char;
                $i++;
            }
        }

        return $result;
    }

    public static function s2t(string $text): string
    {
        $dictionariy = self::loadDictionary('s2t');
        $result = self::convert($text, $dictionariy);
        return $result;
    }

    public static function t2s(string $text): string
    {
        $dictionariy = self::loadDictionary('t2s');
        return self::convert($text, $dictionariy);
    }

    public static function s2tw(string $text): string
    {
        $dictionariy = self::loadDictionary('t2tw');
        $traditional = self::s2t($text);
        return self::convert($traditional, $dictionariy);
    }

    public static function s2hk(string $text): string
    {
        $dictionariy = self::loadDictionary('t2hk');
        $traditional = self::s2t($text);
        return self::convert($traditional, $dictionariy);
    }

    public static function tw2s(string $text): string
    {
        $dictionariy = array_flip(self::loadDictionary('t2tw'));
        $traditional = self::convert($text, $dictionariy);
        return self::t2s($traditional);
    }

    public static function hk2s(string $text): string
    {
        $dictionariy = array_flip(self::loadDictionary('t2hk'));
        $traditional = self::convert($text, $dictionariy);
        return self::t2s($traditional);
    }
}
