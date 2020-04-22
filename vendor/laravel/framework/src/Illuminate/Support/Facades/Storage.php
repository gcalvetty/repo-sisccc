<?php

namespace Illuminate\Support\Facades;

use Illuminate\Filesystem\Filesystem;

/**
 * @method static \Illuminate\Contracts\Filesystem\Filesystem disk(string $name = null)
 *
 * @see \Illuminate\Filesystem\FilesystemManager
 */
class Storage extends Facade
{
    /**
     * Replace the given disk with a local testing disk.
     *
     * @param  string|null  $disk
<<<<<<< HEAD
     *
     * @return \Illuminate\Filesystem\Filesystem
=======
     * @param  array  $config
     * @return \Illuminate\Contracts\Filesystem\Filesystem
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     */
    public static function fake($disk = null, array $config = [])
    {
        $disk = $disk ?: static::$app['config']->get('filesystems.default');

        (new Filesystem)->cleanDirectory(
            $root = storage_path('framework/testing/disks/'.$disk)
        );

<<<<<<< HEAD
        static::set($disk, $fake = self::createLocalDriver(['root' => $root]));
=======
        static::set($disk, $fake = static::createLocalDriver(array_merge($config, [
            'root' => $root,
        ])));
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33

        return $fake;
    }

    /**
     * Replace the given disk with a persistent local testing disk.
     *
     * @param  string|null  $disk
<<<<<<< HEAD
     * @return \Illuminate\Filesystem\Filesystem
=======
     * @param  array  $config
     * @return \Illuminate\Contracts\Filesystem\Filesystem
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     */
    public static function persistentFake($disk = null, array $config = [])
    {
        $disk = $disk ?: static::$app['config']->get('filesystems.default');

<<<<<<< HEAD
        static::set($disk, $fake = self::createLocalDriver([
            'root' => storage_path('framework/testing/disks/'.$disk),
        ]));
=======
        static::set($disk, $fake = static::createLocalDriver(array_merge($config, [
            'root' => storage_path('framework/testing/disks/'.$disk),
        ])));
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
        return 'filesystem';
    }
}
