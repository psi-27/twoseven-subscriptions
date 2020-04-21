<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(TwoSeven\Models\Channel::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'code' => $faker->regexify('[A-Za-z]{10}'),
    ];
});
