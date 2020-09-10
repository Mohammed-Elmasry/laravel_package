<?php

namespace Masry\Lighthouse;

//require_once __DIR__ . "/../routes/web.php";

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Masry\Lighthouse\Console\InstallLighthousePackage;
use Masry\Lighthouse\Console\MakeFooCommand;
use Illuminate\Contracts\Http\Kernel;
use Masry\Lighthouse\Http\Middleware\CapitalizeTitle;
use Illuminate\Routing\Router;

class LighthouseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind("calculator", function ($app) {
            return new Calculator();
        });
    }

    public function boot(Filesystem $filesystem)
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallLighthousePackage::class,
                MakeFooCommand::class,
            ]);

            $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
        }

        $this->publishes([
            __DIR__ . "/../config/lighthouse.php" => config_path("lighthouse.php")
        ], "config");

        $this->publishes([
            __DIR__ . "/../resources/assets" => public_path("lighthouse")
        ],  "assets");

        $this->loadRoutesFrom(__DIR__. "/../routes/web.php");

        $this->loadViewsFrom(__DIR__ . "/../resources/views", "lighthouse");

        $router = $this->app->make(Router::class);
//        $router->pushMiddlewareToGroup("web", CapitalizeTitle::class);
        $router->aliasMiddleware("capitalize", CapitalizeTitle::class);
    }
}
