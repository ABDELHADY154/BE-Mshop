<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'level' => rand(0, 3),
        'description' => $faker->text(150),
        'parent_id' => rand(0, 7),
    ];
});
