<?php

namespace TwoSeven;

class ChannelsFactory
{
    public function get($name)
    {
        $realName = ucfirst($name . "Channel");
        if (class_exists($realName)) {
            return $realName;
        }
        return new \stdClass();s
    }
}