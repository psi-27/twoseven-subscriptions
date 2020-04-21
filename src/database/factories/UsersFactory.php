<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define( App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->password,
    ];
});