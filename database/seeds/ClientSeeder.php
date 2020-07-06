<?php

use App\Client;
use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 50)->create();
        // $faker = Faker::create();
        // // $faker = new Faker;
        // foreach (range(0, 10) as $number) {
        //     Client::create([
        //         'name' => $faker->name,
        //         'email' => Str::random(5) . '@gmail.com',
        //         'phone_number' => $faker->e164PhoneNumber,
        //         'password' => $faker->password,

        //         // 'category_id' => rand(1, count(Category::all())),
        //         // 'desc' => Str::random(50),
        //         // 'price' => rand(10, 1000),
        //         // 'quantity' => rand(1, 200),
        //         // 'user_id' => rand(1, count(User::all()))


        //     ]);

    }
}
