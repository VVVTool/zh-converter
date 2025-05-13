<?php

namespace VVVTool\ZhConverter\Core;

class Dictionary
{
    /**
     * @var array
     */
    private $dict = [];

    /**
     * @var string
     */
    private $dictionaryPath;

    /**
     * Dictionary constructor.
     * @param string $dictionaryPath
     */
    public function __construct(string $dictionaryPath)
    {
        $this->dictionaryPath = $dictionaryPath;
        $this->loadDictionary();
    }

    /**
     * Load dictionary from JSON file
     */
    private function loadDictionary(): void
    {
        if (!file_exists($this->dictionaryPath)) {
            throw new \RuntimeException("Dictionary file not found: {$this->dictionaryPath}");
        }

        $content = file_get_contents($this->dictionaryPath);
        $data = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Invalid JSON in dictionary file');
        }

        $this->dict = $data;
    }

    /**
     * Get translation for a phrase
     *
     * @param string $phrase
     * @return string|null
     */
    public function getTranslation(string $phrase): ?string
    {
        return $this->dict[$phrase] ?? null;
    }

    /**
     * Get all phrases in the dictionary
     *
     * @return array
     */
    public function getAllPhrases(): array
    {
        return array_keys($this->dict);
    }

    /**
     * Get dictionary size
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->dict);
    }

    /**
     * Check if phrase exists in dictionary
     *
     * @param string $phrase
     * @return bool
     */
    public function hasPhrase(string $phrase): bool
    {
        return isset($this->dict[$phrase]);
    }
}
