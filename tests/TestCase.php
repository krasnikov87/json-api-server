<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Swis\JsonApi\Server\Providers\LaravelApiServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        config(['laravel_api.path.routes' => 'tests/TestClasses/Routes']);

        return [LaravelApiServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $dir = substr(__DIR__, 0, strpos(__DIR__, 'tests'));
        app()->setBasePath($dir);
    }
}
