<?php

namespace Deligoez\EventMachine;

use Deligoez\EventMachine\Commands\EventMachineCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EventMachineServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-event-machine')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-event-machine_table')
            ->hasCommand(EventMachineCommand::class);
    }
}
