<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'web', 'avatar', 'agency_id',
    ];


    /**
     * Get the agency that the contact belongs.
     */
    public function agency()
    {
        return $this->belongsTo('App\Agency');
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function createItem($request)
    {
        $item = $this->create($request)->toArray();

        $this->getException($item, 'Error, the contact is not created!');

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

        $this->getException($item, 'Error, the contact is not updated!');

        return $item;
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function deleteItem()
    {
        $item = $this->delete();

        $this->getException($item, 'Error! Contact is not deleted!');

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
