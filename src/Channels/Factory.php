<?php

namespace TwoSeven\Channels;

class Factory
{
    public static function get($name)
    {
        $realName = ucfirst($name . "Channel");
        if (class_exists(__NAMESPACE__ . '\\' . $realName)) {
            return $realName;
        }
        return new \stdClass();
    }
}