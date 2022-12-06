<?php

namespace Deligoez\EventMachine;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Deligoez\EventMachine\Commands\EventMachineCommand;

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
