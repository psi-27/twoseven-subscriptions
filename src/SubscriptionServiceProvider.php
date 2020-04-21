<?php

namespace TwoSeven;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register("subscriptions", function () {
            return new ChannelsFactory;
        });
    }
}