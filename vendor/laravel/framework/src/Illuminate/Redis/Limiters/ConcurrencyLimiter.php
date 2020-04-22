<?php

namespace Illuminate\Redis\Limiters;

use Exception;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
use Illuminate\Contracts\Redis\LimiterTimeoutException;
use Illuminate\Support\Str;

class ConcurrencyLimiter
{
    /**
     * The Redis factory implementation.
     *
     * @var \Illuminate\Redis\Connections\Connection
     */
    protected $redis;

    /**
     * The name of the limiter.
     *
     * @var string
     */
    protected $name;

    /**
     * The allowed number of concurrent tasks.
     *
     * @var int
     */
    protected $maxLocks;

    /**
     * The number of seconds a slot should be maintained.
     *
     * @var int
     */
    protected $releaseAfter;

    /**
     * Create a new concurrency limiter instance.
     *
     * @param  \Illuminate\Redis\Connections\Connection  $redis
     * @param  string  $name
     * @param  int  $maxLocks
     * @param  int  $releaseAfter
     * @return void
     */
    public function __construct($redis, $name, $maxLocks, $releaseAfter)
    {
        $this->name = $name;
        $this->redis = $redis;
        $this->maxLocks = $maxLocks;
        $this->releaseAfter = $releaseAfter;
    }

    /**
     * Attempt to acquire the lock for the given number of seconds.
     *
     * @param  int  $timeout
     * @param  callable|null  $callback
     * @return bool
     *
     * @throws \Illuminate\Contracts\Redis\LimiterTimeoutException
     * @throws \Exception
     */
    public function block($timeout, $callback = null)
    {
        $starting = time();

        $id = Str::random(20);

        while (! $slot = $this->acquire($id)) {
            if (time() - $timeout >= $starting) {
                throw new LimiterTimeoutException;
            }

            usleep(250 * 1000);
        }

        if (is_callable($callback)) {
            try {
                return tap($callback(), function () use ($slot, $id) {
                    $this->release($slot, $id);
                });
            } catch (Exception $exception) {
                $this->release($slot, $id);

                throw $exception;
            }
        }

        return true;
    }

    /**
     * Attempt to acquire the lock.
     *
<<<<<<< HEAD
     * @param string $id A unique identifier for this lock
     *
=======
     * @param  string  $id  A unique identifier for this lock
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     * @return mixed
     */
    protected function acquire($id)
    {
        $slots = array_map(function ($i) {
            return $this->name.$i;
        }, range(1, $this->maxLocks));

        return $this->redis->eval(...array_merge(
            [$this->lockScript(), count($slots)],
            array_merge($slots, [$this->name, $this->releaseAfter, $id])
        ));
    }

    /**
     * Get the Lua script for acquiring a lock.
     *
     * KEYS    - The keys that represent available slots
     * ARGV[1] - The limiter name
     * ARGV[2] - The number of seconds the slot should be reserved
     * ARGV[3] - The unique identifier for this lock
     *
     * @return string
     */
    protected function lockScript()
    {
        return <<<'LUA'
for index, value in pairs(redis.call('mget', unpack(KEYS))) do
    if not value then
<<<<<<< HEAD
        redis.call('set', ARGV[1]..index, ARGV[3], "EX", ARGV[2])
=======
        redis.call('set', KEYS[index], ARGV[3], "EX", ARGV[2])
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
        return ARGV[1]..index
    end
end
LUA;
    }

    /**
     * Release the lock.
     *
<<<<<<< HEAD
     * @param  string $key
     * @param  string $id
     * @return void
     */
    protected function release($key, $id)
    {
        $this->redis->eval($this->releaseScript(), 1, $key, $id);
    }

    /**
     * Get the Lua script to atomically release a lock.
     *
     * KEYS[1] - The name of the lock
     * ARGV[1] - The unique identifier for this lock
     *
     * @return string
     */
    protected function releaseScript()
    {
=======
     * @param  string  $key
     * @param  string  $id
     * @return void
     */
    protected function release($key, $id)
    {
        $this->redis->eval($this->releaseScript(), 1, $key, $id);
    }

    /**
     * Get the Lua script to atomically release a lock.
     *
     * KEYS[1] - The name of the lock
     * ARGV[1] - The unique identifier for this lock
     *
     * @return string
     */
    protected function releaseScript()
    {
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
        return <<<'LUA'
if redis.call('get', KEYS[1]) == ARGV[1]
then
    return redis.call('del', KEYS[1])
else
    return 0
end
LUA;
    }
}
