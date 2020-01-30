<?php

namespace hyungjune\ReactAuth;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Support\Facades\File;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::updatePackages();
        static::updateModels();
        static::updateApiControllers();
        static::updateViews();
        static::updateMails();
        static::updateMigrations();
        static::updateRoutes();
        static::updateMix();
        static::updateScripts();
        static::updateSass();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge($packages, [
            "@babel/preset-react" => "^7.0.0",
            "react"=> "^16.2.0",
            "react-dom" => "^16.2.0",
            "react-redux" => "^7.1.3",
            "react-router-dom" => "^5.1.2",
            "redux" => "^4.0.4",
            "redux-devtools-extension" => "^2.13.8",
            "redux-thunk" => "^2.3.0"
        ]);
    }

    public static function updateModels()
    {
        File::copyDirectory(__DIR__.'/stubs/models', app_path("/"));
    }

    public static function updateApiControllers()
    {
        File::copyDirectory(__DIR__.'/stubs/apiControllers/Api', app_path("/Http/Controllers/Api"));
    }

    public static function updateViews()
    {
        File::copyDirectory(__DIR__.'/stubs/views', resource_path("/views"));
    }

    public static function updateMails()
    {
        File::copyDirectory(__DIR__.'/stubs/mails', app_path("/Mail"));
    }

    public static function updateMigrations()
    {
        File::copyDirectory(__DIR__.'/stubs/migrations', base_path("/migrations"));
    }

    public static function updateRoutes()
    {
        copy(__DIR__.'/stubs/routes/api.php', base_path("/routes/api.php"));
        copy(__DIR__.'/stubs/routes/web.php', base_path("/routes/web.php"));
    }

    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path("webpack.mix.js"));
    }

    public static function updateScripts()
    {
        File::copyDirectory(__DIR__ . '/stubs/scripts', resource_path("js"));
    }

    public static function updateSass()
    {
        File::copyDirectory(__DIR__.'/stubs/sass', resource_path("sass"));
    }
}
