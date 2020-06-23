<?php

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use PhpParser\Parser\Multiple;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker;
        $products = Product::all();
        foreach (range(0, 10) as $number) {
            foreach ($products as $product) {
                OrderDetail::create([
                    'order_id' => rand(1, count(Order::all())),
                    'product_id' => $product->id,
                    'quantity' => $quantity =  rand(1, 200),
                    'price' => $price = $product->price,
                    'total' => $quantity * $price



                ]);
            }
        }
    }
}
