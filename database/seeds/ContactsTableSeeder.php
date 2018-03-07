<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $limit = 200;

        for ($i = 0; $i < $limit; $i++) {

            DB::table('contacts')->insert([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'web' => $faker->url,
                'avatar' => '',
                'agency_id' => rand(1,33),
            ]);
        }
    }
}
