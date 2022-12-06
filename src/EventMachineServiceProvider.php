<?php

namespace Deligoez\EventMachine;

use Deligoez\EventMachine\Commands\EventMachineCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EventMachineServiceProvider extends PackageServiceProvider
{
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
