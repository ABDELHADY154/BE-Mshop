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
        factory(Client::class, 200)->create();
    }
}
