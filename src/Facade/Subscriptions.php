<?php

namespace TwoSeven\Facade;

use Illuminate\Support\Facades\Facade;

class Subscriptions extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'subscriptions';
    }
}
