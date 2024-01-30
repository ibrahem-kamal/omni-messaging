<?php

namespace Ibrahemkamal\OmniMessaging;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OmniMessagingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('omni-messaging')
            ->hasConfigFile();
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(\Ibrahemkamal\OmniMessaging\Facades\OmniMessaging::class, OmniMessaging::class);
    }
}
