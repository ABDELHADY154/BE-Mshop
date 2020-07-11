<?php

use App\Category;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Intiger;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 50)->create();

        // $faker = new Faker;
        // foreach (range(0, 10) as $number) {
        //     Product::create([
        //         'name' => Str::random(5),
        //         'category_id' => rand(1, count(Category::all())),
        //         'desc' => Str::random(50),
        //         'price' => rand(10, 1000),
        //         'quantity' => rand(1, 200),
        //         'user_id' => rand(1, count(User::all()))


        //     ]);
        // }
    }
}
