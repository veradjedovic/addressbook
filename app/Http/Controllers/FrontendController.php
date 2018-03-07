<?php

namespace App\Http\Controllers;


class FrontendController extends Controller
{
    /**
     * Index method
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function editAgency()
    {
        return view('agencies.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function editContact()
    {
        return view('contacts.edit');
    }
}
