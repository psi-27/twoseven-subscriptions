<?php

namespace TwoSeven\Models;

use \Illuminate\Database\Eloquent\Model;
use TwoSeven\ChannelsRelation;

class Subscription extends Model
{

    protected static function booted()
    {
        static::retrieved(function ($user) {
            $this->channels = $this->channels();
        });
    }

    public function contents()
    {
        $model    = new Channel();
        $channels = [];
        foreach (explode(':', $this->package) as $ch) {
            $channels[] = intval($ch);
        }
        $builder = $model->orWhereIn('id', $channels, "or");

        return new ChannelsRelation($builder, $model);

    }

    public function user()
    {
        return $this->hasOne("App\User", "id", "user_id");
    }

    public function channels()
    {
        $packageArray  = explode(':', $this->package);
        $channelsArray = [];
        foreach ($packageArray as $channelId) {
            $channelsArray = Channel::find($channelId);
        }
        return $channelsArray;
    }
}
