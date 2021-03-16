<?php
namespace Itigoppo\BacklogApi\Providers;

class LaravelServiceProvider extends AbstractServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $path = realpath(__DIR__ . '/../../config/config.php');

        $this->publishes([$path => config_path('backlog.php')], 'config');
        $this->mergeConfigFrom($path, 'backlog');
    }
}
