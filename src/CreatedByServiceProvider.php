<?php

namespace Hylk\CreatedBy;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
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
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        Blueprint::macro('createdBy', function () {
            $this->foreignIdFor(config('auth.providers.users.model', User::class), 'created_by')
                ->nullable()
                ->default(null);
        });
        Blueprint::macro('dropCreatedBy', function () {
            $this->dropColumn('created_by');
        });
        Blueprint::macro('updatedBy', function () {
            $this->foreignIdFor(config('auth.providers.users.model', User::class), 'updated_by')
                ->nullable()
                ->default(null);
        });
        Blueprint::macro('dropUpdatedBy', function () {
            $this->dropColumn('updated_by');
        });
    }
}
