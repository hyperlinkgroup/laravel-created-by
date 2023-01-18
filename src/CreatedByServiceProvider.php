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
        if (! Blueprint::hasMacro('createdBy')) {
            Blueprint::macro('createdBy', function () {
                $this->foreignIdFor(config('auth.providers.users.model', User::class), 'created_by')
                    ->nullable()
                    ->default(null);
            });
        }
        if (! Blueprint::hasMacro('updatedBy')) {
            Blueprint::macro('updatedBy', function () {
                $this->foreignIdFor(config('auth.providers.users.model', User::class), 'updated_by')
                    ->nullable()
                    ->default(null);
            });
        }
        if (! Blueprint::hasMacro('deletedBy')) {
            Blueprint::macro('deletedBy', function () {
                $this->foreignIdFor(config('auth.providers.users.model', User::class), 'deleted_by')
                    ->nullable()
                    ->default(null);
            });
        }
        if (! Blueprint::hasMacro('restoredBy')) {
            Blueprint::macro('restoredBy', function () {
                $this->foreignIdFor(config('auth.providers.users.model', User::class), 'restored_by')
                    ->nullable()
                    ->default(null);
            });
        }
        if (! Blueprint::hasMacro('restoredAt')) {
            Blueprint::macro('restoredAt', function () {
                $this->timestamp('restored_at')->nullable()->default(null);
            });
        }
        if (! Blueprint::hasMacro('dropCreatedBy')) {
            Blueprint::macro('dropCreatedBy', function () {
                $this->dropColumn('created_by');
            });
        }
        if (! Blueprint::hasMacro('dropUpdatedBy')) {
            Blueprint::macro('dropUpdatedBy', function () {
                $this->dropColumn('updated_by');
            });
        }
        if (! Blueprint::hasMacro('dropDeletedBy')) {
            Blueprint::macro('dropDeletedBy', function () {
                $this->dropColumn('deleted_by');
            });
        }
        if (! Blueprint::hasMacro('dropRestoredBy')) {
            Blueprint::macro('dropRestoredBy', function () {
                $this->dropColumn('restored_by');
            });
        }
        if (! Blueprint::hasMacro('dropRestoredAt')) {
            Blueprint::macro('dropRestoredAt', function () {
                $this->dropColumn('restored_at');
            });
        }
    }
}
