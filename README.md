# Laravel Queue Beanstalkd Extender

Extends Laravel's Beanstalkd connector. It currently adds 2 main things:

1. It pre-caches the attempts, so you can access the number of attempts even if the job has since been released/deleted
2. It silently ignores the `TubeNotFoundException` exceptions when checking sizes of tubes (in `queue:monitor` for example), since you might monitor a tube/queue that is used less frequently, and Beanstalk will remove it completely if it is empty for a bit

## Installation

Add:

```json
{
    "type": "vcs",
    "url": "https://github.com/manavo/laravel-queue-beanstalkd-extender.git"
}
```

To the `repositories` section of your `composer.json` file.

Then run:

```bash
composer require manavo/laravel-queue-beanstalkd-extender:dev-main
```

Finally, in your `AppServiceProvider`'s `boot` method, include:

```php
app('queue')->extend('beanstalkd', fn() => new BeanstalkdConnector());
```