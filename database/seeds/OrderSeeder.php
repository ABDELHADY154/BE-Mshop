<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker;
        foreach (range(0, 10) as $number) {
            Order::create([
                'name' => Str::random(5)


            ]);
        }
    }
}
