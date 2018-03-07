<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'country_name' => 'Srbija',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Crna Gora',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Bosna i Hercegovina',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Hrvatska',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Madjarska',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Rumunija',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Bugarska',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Italija',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Velika Britanija',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Francuska',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Španija',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Nemačka',
        ]);
    }
}
