<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'price' => rand(50, 500),
        'quantity' => rand(50, 500),
        'category_id' => rand(1, Category::all()->count()),
        'desc' => $faker->text(500),
        'user_id' => rand(1, User::all()->count()),
    ];
});
