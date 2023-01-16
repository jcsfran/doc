<?php

namespace Julio\Swagger\Src;

use Illuminate\Support\ServiceProvider;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // $viewPath = __DIR__ . '/../resources/views';
        // $this->loadViewsFrom($viewPath, 'l5-swagger');

        // Publish a config file
        $configPath = __DIR__ . '/../config/documentation.php';
        $this->publishes([
            $configPath => config_path('documentation.php'),
        ], 'config');

        //Publish views
        // $this->publishes([
        //     __DIR__ . '/../resources/views' => config('l5-swagger.defaults.paths.views'),
        // ], 'views');

        //Include routes
        // $this->loadRoutesFrom(__DIR__ . '/routes.php');

        //Register commands
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/documentation.php';
        $this->mergeConfigFrom($configPath, 'documentation');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
