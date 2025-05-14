<?php

namespace VVVTool\ZhConverter;

use VVVTool\ZhConverter\Core\DictionaryLoader;

class ZhConverter
{
    /**
     * @var DictionaryLoader
     */
    private $loader;


    public function __construct(?string $dictionaryDir = null)
    {
        $this->loader = new DictionaryLoader($dictionaryDir);
    }

    /**
     * Convert Simplified Chinese to Traditional Chinese
     */
    public function toTraditional(string $text): string
    {
        $dictionaries = $this->loader->load('s2t');

        return $this->convert($text, $dictionaries);
    }

    /**
     * Convert Traditional Chinese to Simplified Chinese
     */
    public function toSimplified(string $text): string
    {
        $dictionaries = $this->loader->load('t2s');
        return $this->convert($text, $dictionaries);
    }

    /**
     * Core conversion logic
     */
    private function convert(string $text, $dictionaries): string
    {
        if (empty($text)) {
            return '';
        }

        // First convert phrases
        $phrases = $dictionaries['phrase']->getAllPhrases();
        usort($phrases, function ($a, $b) {
            return mb_strlen($b, 'UTF-8') - mb_strlen($a, 'UTF-8');
        });

        // 使用一个特殊的标记来保护已替换的短语
        $replacedSegments = [];
        $marker = "\u{FFFF}"; // 使用实际的 Unicode 字符而不是字符串表示
        $counter = 0;

        foreach ($phrases as $phrase) {
            // 先检查文本中是否存在该短语
            if (strpos($text, $phrase) !== false) {
                $replacement = $dictionaries['phrase']->getTranslation($phrase);
                if ($replacement) {
                    $placeholder = $marker . $counter . $marker;
                    $replacedSegments[$placeholder] = $replacement;
                    $text = str_replace($phrase, $placeholder, $text);
                    $counter++;
                }
            }
        }

        // Then convert individual characters, but only for non-replaced segments
        $pattern = '/' . preg_quote($marker) . '\d+' . preg_quote($marker) . '|./u';
        preg_match_all($pattern, $text, $matches);

        $result = '';
        foreach ($matches[0] as $segment) {
            if (isset($replacedSegments[$segment])) {
                $result .= $replacedSegments[$segment];
            } else {
                $replacement = $dictionaries['char']->getTranslation($segment);
                $result .= $replacement ?: $segment;
            }
        }

        return $result;
    }

    /**
     * Set custom dictionary directory
     */
    public function setDictionaryDir(string $path): void
    {
        $this->loader->setDictionaryDir($path);
    }
}
