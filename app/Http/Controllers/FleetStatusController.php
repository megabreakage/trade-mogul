<?php

namespace App\Http\Controllers;

use App\Http\Resources\FleetStatusResource;
use App\Models\FleetStatus;
use Illuminate\Http\Request;

class FleetStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = FleetStatus::get();
        return $statuses ? FleetStatusResource::collection($statuses) : new FleetStatusResource([
            'status' => 'error',
            'message' => 'No records have been found'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = FleetStatus::where('identifier', $id)->first();
        return $status ? new FleetStatusResource($status) : new FleetStatusResource([
            'status' => 'error',
            'message' => 'No matching record has been found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
