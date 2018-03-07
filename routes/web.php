<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@index');

// Agencies
Route::get('/agencies/edit', 'FrontendController@editAgency')->name('agencies.edit');

// Contact
Route::get('/contacts/edit', 'FrontendController@editContact')->name('contacts.edit');


