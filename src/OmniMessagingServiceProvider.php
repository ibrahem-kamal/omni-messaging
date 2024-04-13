<?php

namespace Ibrahemkamal\OmniMessaging;

use Illuminate\Foundation\Application;
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
            ->hasRoute('api')
            ->hasConfigFile();
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(OmniMessaging::class, fn (Application $app) => new OmniMessaging($app));
    }
}
