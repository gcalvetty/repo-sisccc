<?php

namespace Illuminate\Redis;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class RedisServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('redis', function ($app) {
            $config = $app->make('config')->get('database.redis', []);

<<<<<<< HEAD
            return new RedisManager($app, Arr::pull($config, 'client', 'predis'), $config);
=======
            return new RedisManager($app, Arr::pull($config, 'client', 'phpredis'), $config);
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
        });

        $this->app->bind('redis.connection', function ($app) {
            return $app['redis']->connection();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['redis', 'redis.connection'];
    }
}
