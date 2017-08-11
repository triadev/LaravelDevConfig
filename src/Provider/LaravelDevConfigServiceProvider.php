<?php
namespace Triadev\LaravelDevConfig\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

/**
 * Class LaravelDevConfigServiceProvider
 *
 * @author Christopher Lorke <christopher.lorke@gmx.de>
 * @package Triadev\LaravelDevConfig\Provider
 */
class LaravelDevConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/../Config/config.php');

        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('triadev-dev-config.php'),
        ], 'config');

        $this->mergeConfigFrom($source, 'triadev-dev-config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register and Publish Config.
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'triadev-dev-config');

        if (in_array($this->app->environment(), config('triadev-dev-config.environments'))) {
            $this->registerServiceProvider();
            $this->registerAliases();
        }
    }

    /**
     * Register service provider
     */
    private function registerServiceProvider()
    {
        collect(config('triadev-dev-config.providers'))->each(function ($service_provider) {
            $this->app->register($service_provider);
        });
    }

    /**
     * Register aliases
     */
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();

        collect(config('triadev-dev-config.aliases'))->each(function ($facade, $alias) use ($loader) {
            $loader->alias($alias, $facade);
        });
    }
}
