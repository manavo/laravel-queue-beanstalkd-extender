<?php

namespace Manavo\LaravelQueueBeanstalkdExtender;

use Pheanstalk\Pheanstalk;

class BeanstalkdConnector extends \Illuminate\Queue\Connectors\BeanstalkdConnector
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
            $config['block_for'] ?? 0,
            $config['after_commit'] ?? null
        );
    }
}
