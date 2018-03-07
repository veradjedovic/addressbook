<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Controllers\Controller;
use Exception;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country)
    {
        try {

            $countries = $country->allCountriesWithCities();

            return response(['data' => $countries, 'error' => false, 'message' => 'Success']);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCitiesOfCountry(Country $country)
    {
        try {

            $countries = $country->CountryWithCities();

            return response(['data' => $countries, 'error' => false, 'message' => 'Success']);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }
    }
}
