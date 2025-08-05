# Laravel Queue Beanstalkd Extender

Extends Laravel's Beanstalkd connector. It currently adds 2 main things:

1. It pre-caches the attempts, so you can access the number of attempts even if the job has since been released/deleted
2. It silently ignores the `TubeNotFoundException` exceptions when checking sizes of tubes (in `queue:monitor` for example), since you might monitor a tube/queue that is used less frequently, and Beanstalk will remove it completely if it is empty for a bit
