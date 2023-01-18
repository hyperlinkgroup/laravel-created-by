<?php

namespace Hylk\CreatedBy;

use Hylk\CreatedBy\Commands\CreatedByCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CreatedByServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-created-by')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-created-by_table')
            ->hasCommand(CreatedByCommand::class);
    }
}
