<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Agencies
Route::get('/agencies', 'Api\AgencyController@index')->name('agencies.index');
Route::post('/agencies', 'Api\AgencyController@store')->name('agencies.store');
Route::get('/agencies/list', 'Api\AgencyController@list')->name('agencies.list');
Route::get('/agencies/{agency}/contacts', 'Api\AgencyController@listContactsOfAgency')->name('agencies.contacts');
Route::put('/agencies/{agency}', 'Api\AgencyController@update')->name('agencies.update');
Route::delete('/agencies/{agency}', 'Api\AgencyController@destroy')->name('agencies.destroy');
Route::get('/agencies/{agency}/edit', 'Api\AgencyController@edit')->name('agencies.edit');

// Contacts
Route::post('/contacts', 'Api\ContactController@store')->name('contacts.store');
Route::post('/contacts/{contact}/update', 'Api\ContactController@update')->name('contacts.update');
Route::delete('/contacts/{contact}', 'Api\ContactController@destroy')->name('contacts.destroy');
Route::get('/contacts/{contact}/edit', 'Api\ContactController@edit')->name('contacts.edit');

// Countries
Route::get('/countries', 'Api\CountryController@index')->name('countries.index');
Route::get('/countries/{country}/cities', 'Api\CountryController@listCitiesOfCountry')->name('countries.cities');



