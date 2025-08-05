<?php

namespace Manavo\LaravelQueueBeanstalkdExtender;

use Pheanstalk\Exception\TubeNotFoundException;

class BeanstalkdQueue extends \Illuminate\Queue\BeanstalkdQueue
{

    /**
     * Pop the next job off of the queue.
     *
     * @param  string|null  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
        $job = parent::pop($queue);

        if ($job) {
            return new BeanstalkdJob(
                $this->container, $this->pheanstalk, $job->getPheanstalkJob(), $this->connectionName, $queue
            );
        }
    }

    public function size($queue = null)
    {
        try {
            return parent::size($queue);
        } catch (TubeNotFoundException $exception) {
            return 0;
        }
    }

    public function delayedSize($queue = null)
    {
        try {
            return parent::delayedSize($queue);
        } catch (TubeNotFoundException $exception) {
            return 0;
        }
    }

    public function pendingSize($queue = null)
    {
        try {
            return parent::pendingSize($queue);
        } catch (TubeNotFoundException $exception) {
            return 0;
        }
    }

    public function reservedSize($queue = null)
    {
        try {
            return parent::reservedSize($queue);
        } catch (TubeNotFoundException $exception) {
            return 0;
        }
    }

}
