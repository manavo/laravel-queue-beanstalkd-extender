<?php

namespace Manavo\LaravelQueueBeanstalkdExtender;

use Illuminate\Container\Container;
use Pheanstalk\Contract\JobIdInterface;

class BeanstalkdJob extends \Illuminate\Queue\Jobs\BeanstalkdJob
{

    private int $attempts;

    public function __construct(Container $container, $pheanstalk, JobIdInterface $job, $connectionName, $queue)
    {
        parent::__construct($container, $pheanstalk, $job, $connectionName, $queue);

        // Cache it here, right after reserving it, so we can always check it later
        $this->attempts = parent::attempts();
    }

    public function attempts(): int {
        return $this->attempts;
    }

}
