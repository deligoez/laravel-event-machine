<?php

namespace Deligoez\EventMachine;

use Deligoez\EventMachine\Commands\EventMachineCommand;
use Deligoez\EventMachine\Tests\Stubs\Listeners\EmailVerificationSubscriber;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Spatie\LaravelPackageTools\Package;

class EventMachineServiceProvider extends EventServiceProvider
{
    protected $subscribe = [
        //
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-event-machine')
            ->hasConfigFile();
    }
}
