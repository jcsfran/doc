<?php

namespace Julio\Swagger\Src;

use Illuminate\Support\ServiceProvider;
use Julio\Swagger\Src\Console\CreateRouteForDocumentation;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // $viewPath = __DIR__ . '/../resources';
        // $this->loadViewsFrom($viewPath, 'api-docs');
        $configPath = __DIR__ . '/../config/documentation.php';
        $l5SwaggerPatch = __DIR__ . '/../config/l5-swagger.php';
        $viewsPath = __DIR__ . '/../resources';
        $this->publishes([
            $configPath => config_path('documentation.php'),
            $l5SwaggerPatch => config_path('l5-swagger.php'),
        ], 'config');

        $this->publishes([
            $viewsPath . '/views/docs.blade.php' => base_path('resources/views/api-docs') . '/docs.blade.php',
            $viewsPath . '/views/index.blade.php' => config('l5-swagger.defaults.paths.views') . '/index.blade.php',
            $viewsPath . '/assets' => public_path('docs/assets'),
            $viewsPath . '/utils' => public_path('docs/utils'),
            $viewsPath . '/index.yaml' => public_path('docs/index.yaml'),
            $viewsPath . '/components' => base_path('resources/views/patch-note'),
            $viewsPath . '/../components' => base_path('app/Views/PatchNote'),
        ], 'views');

        //Include routes
        // $this->loadRoutesFrom(__DIR__ . '/routes.php');

        //Register commands
        $this->commands([CreateRouteForDocumentation::class]);
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

        $this->app->singleton('command.docs.route', function ($app) {
            return $app->make(GenerateDocsCommand::class);
        });
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
