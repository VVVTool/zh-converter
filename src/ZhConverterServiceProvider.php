<?php

namespace VVVTool\ZhConverter;

use Illuminate\Support\ServiceProvider;
use VVVTool\ZhConverter\ZhConverter;

class ZhConverterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('zh-converter', function ($app) {
            return new ZhConverter();
        });
    }
}