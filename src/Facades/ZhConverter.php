<?php

namespace VVVTool\ZhConverter\Facades;

use Illuminate\Support\Facades\Facade;

class ZhConverter extends Facade
{
    /**
     * ZhConverter Facade
     * 
     * @method static toTraditional(string $text): string
     * @method static toSimplified(string $text): string
     */
    protected static function getFacadeAccessor()
    {
        return 'zh-converter';
    }
}