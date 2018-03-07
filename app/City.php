<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_name', 'country_id',
    ];


    /**
     * Get the country that the city belongs.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the agencies from the city.
     */
    public function agencies()
    {
        return $this->hasMany('App\Agency');
    }
}
