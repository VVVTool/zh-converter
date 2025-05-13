<?php

namespace VVVTool\ZhConverter\Core;


class DictionaryLoader
{
    /**
     * @var Dictionary[]
     */
    private $dictionaries = [];

    /**
     * @var Dictionary[]
     */
    private $charDictionaries = [];

    /**
     * @var string
     */
    private $dictionaryDir;

    /**
     * DictionaryLoader constructor.
     * @param string|null $dictionaryDir Optional custom dictionary directory path
     */
    public function __construct(?string $dictionaryDir = null)
    {
        $this->dictionaryDir = $dictionaryDir ?? dirname(__DIR__) . '/Dictionaries';
    }

    /**
     * Load specified dictionary type including both phrase and char dictionaries
     *
     * @param string $type Dictionary type (s2t or t2s)
     * @return array{phrase: Dictionary, char: Dictionary}
     * @throws \RuntimeException
     */
    public function load(string $type): array
    {
        // Return cached dictionaries if available
        if (isset($this->dictionaries[$type]) && isset($this->charDictionaries[$type])) {
            return [
                'phrase' => $this->dictionaries[$type],
                'char' => $this->charDictionaries[$type]
            ];
        }

        // Define filenames based on type
        switch ($type) {
            case 's2t':
                $files = [
                    'phrase' => 's2t-phrase.min.json',
                    'char' => 's2t-char.min.json'
                ];
                break;
            case 't2s':
                $files = [
                    'phrase' => 't2s-phrase.min.json',
                    'char' => 't2s-char.min.json'
                ];
                break;
            default:
                throw new \InvalidArgumentException("Unsupported dictionary type: {$type}");
        }

        // Load phrase dictionary
        $phrasePath = $this->dictionaryDir . '/' . $files['phrase'];
        $this->dictionaries[$type] = new Dictionary($phrasePath);

        // Load char dictionary
        $charPath = $this->dictionaryDir . '/' . $files['char'];
        $this->charDictionaries[$type] = new Dictionary($charPath);

        return [
            'phrase' => $this->dictionaries[$type],
            'char' => $this->charDictionaries[$type]
        ];
    }

    /**
     * Get loaded dictionaries by type
     *
     * @param string $type
     * @return array{phrase: ?Dictionary, char: ?Dictionary}
     */
    public function getDictionaries(string $type): array
    {
        return [
            'phrase' => $this->dictionaries[$type] ?? null,
            'char' => $this->charDictionaries[$type] ?? null
        ];
    }

    /**
     * Set custom dictionary directory
     *
     * @param string $path
     * @return void
     */
    public function setDictionaryDir(string $path): void
    {
        if (!is_dir($path)) {
            throw new \InvalidArgumentException("Directory not found: {$path}");
        }
        $this->dictionaryDir = $path;
        $this->dictionaries = [];
        $this->charDictionaries = [];
    }

    /**
     * Get current dictionary directory
     *
     * @return string
     */
    public function getDictionaryDir(): string
    {
        return $this->dictionaryDir;
    }
}
