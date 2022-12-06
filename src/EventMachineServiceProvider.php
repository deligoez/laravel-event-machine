<?php

namespace Deligoez\EventMachine;

use Deligoez\EventMachine\Commands\EventMachineCommand;
use Deligoez\EventMachine\Tests\Stubs\Listeners\EmailVerificationSubscriber;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EventMachineServiceProvider extends EventServiceProvider
{
    protected $subscribe = [
        EmailVerificationSubscriber::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-event-machine')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-event-machine_table')
            ->hasCommand(EventMachineCommand::class);
    }
}
