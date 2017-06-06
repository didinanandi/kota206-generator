<?php

namespace KoTA206\Generator;

use Illuminate\Support\ServiceProvider;
use KoTA206\Generator\Commands\API\APIControllerGeneratorCommand;
use KoTA206\Generator\Commands\API\APIGeneratorCommand;
use KoTA206\Generator\Commands\API\APIRequestsGeneratorCommand;
use KoTA206\Generator\Commands\API\TestsGeneratorCommand;
use KoTA206\Generator\Commands\APIScaffoldGeneratorCommand;
use KoTA206\Generator\Commands\Common\MigrationGeneratorCommand;
use KoTA206\Generator\Commands\Common\ModelGeneratorCommand;
use KoTA206\Generator\Commands\Common\RepositoryGeneratorCommand;
use KoTA206\Generator\Commands\Publish\GeneratorPublishCommand;
use KoTA206\Generator\Commands\Publish\LayoutPublishCommand;
use KoTA206\Generator\Commands\Publish\PublishTemplateCommand;
use KoTA206\Generator\Commands\Publish\VueJsLayoutPublishCommand;
use KoTA206\Generator\Commands\RollbackGeneratorCommand;
use KoTA206\Generator\Commands\Scaffold\ControllerGeneratorCommand;
use KoTA206\Generator\Commands\Scaffold\RequestsGeneratorCommand;
use KoTA206\Generator\Commands\Scaffold\ScaffoldGeneratorCommand;
use KoTA206\Generator\Commands\Scaffold\ViewsGeneratorCommand;
use KoTA206\Generator\Commands\VueJs\VueJsGeneratorCommand;

class KoTA206GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/laravel_generator.php';

        $this->publishes([
            $configPath => config_path('KoTA206/laravel_generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('KoTA206.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('KoTA206.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('KoTA206.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('KoTA206.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('KoTA206.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('KoTA206.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('KoTA206.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('KoTA206.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('KoTA206.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('KoTA206.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('KoTA206.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('KoTA206.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('KoTA206.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('KoTA206.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('KoTA206.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('KoTA206.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('KoTA206.vuejs', function ($app) {
            return new VueJsGeneratorCommand();
        });
        $this->app->singleton('KoTA206.publish.vuejs', function ($app) {
            return new VueJsLayoutPublishCommand();
        });

        $this->commands([
            'KoTA206.publish',
            'KoTA206.api',
            'KoTA206.scaffold',
            'KoTA206.api_scaffold',
            'KoTA206.publish.layout',
            'KoTA206.publish.templates',
            'KoTA206.migration',
            'KoTA206.model',
            'KoTA206.repository',
            'KoTA206.api.controller',
            'KoTA206.api.requests',
            'KoTA206.api.tests',
            'KoTA206.scaffold.controller',
            'KoTA206.scaffold.requests',
            'KoTA206.scaffold.views',
            'KoTA206.rollback',
            'KoTA206.vuejs',
            'KoTA206.publish.vuejs',
        ]);
    }
}
