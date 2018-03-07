<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city_name' => 'Beograd',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Novi Sad',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Niš',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Kragujevac',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Kruševac',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Kraljevo',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Trstenik',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Čačak',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Užice',
            'country_id' => 1,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Podgorica',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Budva',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Herceg Novi',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Tivat',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Bar',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Kolašin',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Žabljak',
            'country_id' => 2,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Sarajevo',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Mostar',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Banja Luka',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Tuzla',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Zenica',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Trebinje',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Brčko',
            'country_id' => 3,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Zagreb',
            'country_id' => 4,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Slavonski Brod',
            'country_id' => 4,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Vukovar',
            'country_id' => 4,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Osijek',
            'country_id' => 4,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Budimpešta',
            'country_id' => 5,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Segedin',
            'country_id' => 5,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Pečuj',
            'country_id' => 5,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Bukurešt',
            'country_id' => 6,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Temišvar',
            'country_id' => 6,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Kluž-Napoka',
            'country_id' => 6,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Sofija',
            'country_id' => 7,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Varna',
            'country_id' => 7,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Sunčev Breg',
            'country_id' => 7,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Rim',
            'country_id' => 8,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Milano',
            'country_id' => 8,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Venecija',
            'country_id' => 8,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Trst',
            'country_id' => 8,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Torino',
            'country_id' => 8,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'London',
            'country_id' => 9,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Mančester',
            'country_id' => 9,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Liverpul',
            'country_id' => 9,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Edinburg',
            'country_id' => 9,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Glazgov',
            'country_id' => 9,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Pariz',
            'country_id' => 10,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Marsej',
            'country_id' => 10,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Nica',
            'country_id' => 10,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Kan',
            'country_id' => 10,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Lion',
            'country_id' => 10,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Madrid',
            'country_id' => 11,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Barselona',
            'country_id' => 11,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Malaga',
            'country_id' => 11,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Minhen',
            'country_id' => 12,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Frankfurt',
            'country_id' => 12,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Drezden',
            'country_id' => 12,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Dortmund',
            'country_id' => 12,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Berlin',
            'country_id' => 12,
        ]);
    }
}
