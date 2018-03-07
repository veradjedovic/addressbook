<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Agency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agency_name', 'address', 'phone', 'email', 'web', 'city_id', 'country_id',
    ];


    /**
     * Get the country that the agency belongs.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the city that the agency belongs.
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * Get the contacts belongs to agencies.
     */
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function allAgencies()
    {
        $agencies = $this->orderBy('agency_name', 'asc')->get();

        $this->getException($agencies, 'There are not agencies.');

        return $agencies;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function allAgencyWithContactsAndCity()
    {
        $agencies = $this->with('city')->get();

        $this->getException($agencies, 'There are not agencies.');

        return $agencies;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function agencyWithContacts()
    {
        $contacts = $this->contacts;

        $this->getException($contacts, 'No contacts.');

        return $contacts;
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function createItem($request)
    {
        $item = $this->create($request)->toArray();

        $this->getException($item, 'Error, the agency is not created!');

        return $item;
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function updateItem($request)
    {
        $item = $this->update($request);

        $this->getException($item, 'Error, the agency is not updated!');

        return $item;
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function deleteItem()
    {
        $item = $this->delete();

        $this->getException($item, 'Error! Agency is not deleted!');

        return $item;
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
