<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->e164PhoneNumber,
        'password' => Hash::make('M.abdelhady@123123'),
    ];
});
