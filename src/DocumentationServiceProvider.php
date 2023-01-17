<?php

namespace Julio\Swagger\Src;

use Illuminate\Support\ServiceProvider;
use Julio\Swagger\Src\Console\{
    CreateRouteForDocumentation,
    PatchNoteCommand,
};

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/documentation.php';
        $l5SwaggerPatch = __DIR__ . '/../config/l5-swagger.php';
        $resourcesPath = __DIR__ . '/../resources';

        $this->publishes([
            $configPath => config_path('documentation.php'),
            $l5SwaggerPatch => config_path('l5-swagger.php'),
            $resourcesPath . '/views/index.blade.php' => config('l5-swagger.defaults.paths.views') . '/index.blade.php',

            $resourcesPath . '/views/docs.blade.php' => base_path('resources/views/api-docs') . '/docs.blade.php',
            $resourcesPath . '/components' => base_path('resources/views/components'),
            $resourcesPath . '/../components' => base_path('app/Views/Components'),

            $resourcesPath . '/assets' => public_path('docs/assets'),
            $resourcesPath . '/utils' => public_path('docs/utils'),
            $resourcesPath . '/index.yaml' => public_path('docs/index.yaml'),
            $resourcesPath . '/responses' => public_path('docs/responses'),
        ]);

        $this->commands([
            CreateRouteForDocumentation::class,
            PatchNoteCommand::class,
        ]);
    }
}
