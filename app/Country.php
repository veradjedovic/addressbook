<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_name',
    ];


    /**
     * Get the cities from the country.
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }

    /**
     * Get the agencies from the country.
     */
    public function agencies()
    {
        return $this->hasMany('App\Agency');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function allCountriesWithCities()
    {
        $countries = $this->orderBy("country_name")->get();

        $this->getException($countries, 'No countries.');

        return $countries;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function CountryWithCities()
    {
        $countries = $this->cities;

        $this->getException($countries, 'No cities.');

        return $countries;
    }

    /**
     * @param $item
     * @param $message
     * @throws Exception
     */
    protected function getException($item, $message)
    {
        if (!$item) {
            throw new Exception ($message);
        }
    }
}
