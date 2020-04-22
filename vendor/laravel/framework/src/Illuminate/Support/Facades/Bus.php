<?php

namespace Illuminate\Support\Facades;

use Illuminate\Contracts\Bus\Dispatcher as BusDispatcherContract;
use Illuminate\Support\Testing\Fakes\BusFake;

/**
 * @method static mixed dispatch($command)
 * @method static mixed dispatchNow($command, $handler = null)
 * @method static bool hasCommandHandler($command)
 * @method static bool|mixed getCommandHandler($command)
 * @method static \Illuminate\Contracts\Bus\Dispatcher pipeThrough(array $pipes)
 * @method static \Illuminate\Contracts\Bus\Dispatcher map(array $map)
 *
 * @see \Illuminate\Contracts\Bus\Dispatcher
 */
class Bus extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
<<<<<<< HEAD
=======
     * @param  array|string  $jobsToFake
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     * @return \Illuminate\Support\Testing\Fakes\BusFake
     */
    public static function fake($jobsToFake = [])
    {
<<<<<<< HEAD
        static::swap($fake = new BusFake);
=======
        static::swap($fake = new BusFake(static::getFacadeRoot(), $jobsToFake));
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BusDispatcherContract::class;
    }
}
