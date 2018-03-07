<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Controllers\Controller;
use Exception;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request, Contact $contact)
    {
        try {

            $item = $contact->createItem($request->all());

            $file = $request->file('f_upload');
            if ($request->avatar) {
                $file->storeAs('public/avatars', $request->avatar);
            }

            return response(['message' => 'The contact is created.', 'id' => $item['id'], 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => null, 'error' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return response(['data' => $contact, 'message' => 'Success.',  'error' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ContactUpdateRequest
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        try {
            
            $contact->updateItem($request->all());

            $file = $request->file('f_upload');
            if ($request->avatar) {
                $file->storeAs('public/avatars', $request->avatar);
            }

            return response(['message' => 'This contact is successfully updated.', 'id' => $contact->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $contact->id, 'error' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {

            $contact->deleteItem();

            return response(['message' => 'This contact is deleted.', 'id' => $contact->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $contact->id, 'error' => true]);
        }
    }
}
