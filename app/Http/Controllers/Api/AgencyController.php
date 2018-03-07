<?php

namespace App\Http\Controllers\Api;

use App\Agency;
use App\Http\Requests\AgencyRequest;
use App\Http\Requests\AgencyUpdateRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Agency $agency)
    {
        try {

            return DataTables::of($agency->allAgencyWithContactsAndCity())->addIndexColumn()->make(true);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Agency $agency)
    {
        try {

            $agencies = $agency->allAgencies();

            return response(['data' => $agencies, 'error' => false, 'message' => 'Success']);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listContactsOfAgency(Agency $agency)
    {
        try {

            return DataTables::of($agency->agencyWithContacts())->addIndexColumn()->make(true);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }
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
     * @param  \App\Http\Requests\AgencyRequest  $request
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function store(AgencyRequest $request, Agency $agency)
    {
        try {

            $item = $agency->createItem($request->all());

            return response(['message' => 'This agency is created.', 'id' => $item['id'], 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => null, 'error' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        return response(['data' => $agency, 'message' => 'Success.',  'error' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AgencyUpdateRequest  $request
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(AgencyUpdateRequest $request, Agency $agency)
    {
        try {

            $agency->updateItem($request->all());

            return response(['message' => 'This agency is successfully updated.', 'id' => $agency->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $agency->id, 'error' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        try {

            $agency->deleteItem();

            return response(['message' => 'This agency is deleted.', 'id' => $agency->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $agency->id, 'error' => true]);
        }
    }
}
