<?php

namespace TwoSeven;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bindIf("subscriptions", function () {
            return new Channels\Factory;
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");
        $this->loadViewsFrom(__DIR__ . "/views", "subscriptions");
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php");

        $this->publishes([
            __DIR__ . '/database/factories/' => database_path('factories')
        ]);

        $this->publishes([
            __DIR__ . '/database/seeds/' => database_path('seeds')
        ]);
    }
}