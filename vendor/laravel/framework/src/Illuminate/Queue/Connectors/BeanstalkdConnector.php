<?php

namespace Illuminate\Queue\Connectors;

use Illuminate\Queue\BeanstalkdQueue;
use Pheanstalk\Connection;
use Pheanstalk\Pheanstalk;
<<<<<<< HEAD
use Illuminate\Queue\BeanstalkdQueue;
=======
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33

class BeanstalkdConnector implements ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        return new BeanstalkdQueue(
            $this->pheanstalk($config),
            $config['queue'],
            $config['retry_after'] ?? Pheanstalk::DEFAULT_TTR,
            $config['block_for'] ?? 0
        );
    }

    /**
     * Create a Pheanstalk instance.
     *
     * @param  array  $config
     * @return \Pheanstalk\Pheanstalk
     */
    protected function pheanstalk(array $config)
    {
        return Pheanstalk::create(
            $config['host'],
            $config['port'] ?? Pheanstalk::DEFAULT_PORT,
            $config['timeout'] ?? Connection::DEFAULT_CONNECT_TIMEOUT
        );
    }
}
