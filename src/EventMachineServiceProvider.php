<?php

namespace Deligoez\EventMachine;

use Spatie\LaravelPackageTools\Package;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

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
