<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            
            DB::table('agencies')->insert([
                'agency_name' => $faker->company,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'web' => $faker->url,
                'country_id' => rand(1,12),
                'city_id' => rand(1,59),
            ]);
        }
    }
}
