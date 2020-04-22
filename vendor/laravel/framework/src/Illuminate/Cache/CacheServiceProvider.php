<?php

namespace Illuminate\Cache;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Contracts\Support\DeferrableProvider;
=======
use Symfony\Component\Cache\Adapter\Psr16Adapter;
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33

class CacheServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('cache', function ($app) {
            return new CacheManager($app);
        });

        $this->app->singleton('cache.store', function ($app) {
            return $app['cache']->driver();
        });

        $this->app->singleton('cache.psr6', function ($app) {
            return new Psr16Adapter($app['cache.store']);
        });

        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'cache', 'cache.store', 'cache.psr6', 'memcached.connector',
        ];
    }
}
