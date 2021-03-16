<?php

namespace Itigoppo\BacklogApi\Providers;

use Illuminate\Support\ServiceProvider;
use Itigoppo\BacklogApi\Backlog\Backlog;
use Itigoppo\BacklogApi\Connector\ApiKeyConnector;

abstract class AbstractServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     *
     * @return void
     */
    abstract public function boot();

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();

        $this->registerApiConnector();

        $this->registerBacklogProvider();
    }

    protected function registerAliases()
    {
        $this->app->alias('backlog', Backlog::class);
        $this->app->alias('backlog.connector', ApiKeyConnector::class);
    }

    protected function registerApiConnector()
    {
        $this->app->singleton('backlog.connector', function ($app) {
            return new ApiKeyConnector(
                $this->config('space'),
                $this->config('secret'),
                $this->config('domain')
            );
        });
    }

    protected function registerBacklogProvider()
    {
        $this->app->singleton('backlog', function ($app) {
            return new Backlog($app['backlog.connector']);
        });
    }

    /**
     * Helper to get the config values.
     *
     * @param  string  $key
     * @param  string  $default
     *
     * @return mixed
     */
    protected function config($key, $default = null)
    {
        return config("backlog.$key", $default);
    }
}
