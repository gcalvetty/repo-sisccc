<?php

namespace Illuminate\Foundation\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Database\MigrationServiceProvider;
<<<<<<< HEAD
use Illuminate\Contracts\Support\DeferrableProvider;
=======
use Illuminate\Support\AggregateServiceProvider;
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33

class ConsoleSupportServiceProvider extends AggregateServiceProvider implements DeferrableProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        ArtisanServiceProvider::class,
        MigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
