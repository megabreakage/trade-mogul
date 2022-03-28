<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFleetRequest;
use App\Http\Requests\UpdateFleetRequest;
use App\Http\Resources\FleetResource;
use App\Models\Fleet;
use Exception;
use Illuminate\Support\Str;

class FleetController extends Controller
{

    public function index()
    {
        $fleet = Fleet::with(['fleet_status', 'location'])->get();
        return $fleet ? FleetResource::collection($fleet) : new FleetResource(['status' => 'error', 'message' => 'No records have been found']);
    }

    public function create()
    {
        //
    }

    public function store(StoreFleetRequest $request)
    {
        $validated = $request->safe()->all();

        try {
            $truck = Fleet::create([
                'identifier' => Str::uuid(),
                'fleet_status_id' => 1, // Available by default.
                'registration_number' => $validated['registration_number'],
                'model' => $validated['model'],
                'manufactured_at' => $validated['manufactured_at']

            ]);
            return new FleetResource($truck);
        } catch (Exception $e) {
            return new FleetResource(['status' => 'error', 'message' => 'Truck has not been added succesfully, Kindly try again.', 'errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $truck = Fleet::where('identifier', $id)->first();
        return $truck ? FleetResource::collection($truck) : new FleetResource(['status' => 'error', 'message' => 'No record has been found']);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateFleetRequest $request, $id)
    {
        $truck = Fleet::where('identifier', $id)->first();
        if ($truck) {
            $validated = $request->safe()->all();
            try {
                $truck->update([
                    'fleet_status_id' => $validated['fleet_status_id'],
                    'registration_number' => $validated['registration_number'],
                    'model' => $validated['model'],
                    'manufactured_at' => $validated['manufactured_at'],
                ]);
                return new FleetResource($truck);
            } catch (Exception $e) {
                return new FleetResource(['status' => 'error', 'message' => 'Truck has not been updated succesfully, Kindly try again.', 'errors' => $e->getMessage()]);
            }
        }
        return new FleetResource(['status' => 'error', 'message' => 'No record has been found to update']);
    }

    public function destroy($id)
    {
        $truck = Fleet::where('identifier', $id)->first();
        if ($truck) {
            try {
                $truck->delete();
                return new FleetResource(['status' => 'success', 'message' => 'Truck <strong>' . $truck->registration_number . '</strong> has been deleted succesfully']);
            } catch (Exception $e) {
                return new FleetResource(['status' => 'error', 'message' => 'Truck has not been deleted succesfully, Kindly try again.', 'errors' => $e->getMessage()]);
            }
        }
        return new FleetResource(['status' => 'error', 'message' => 'No record has been found to update']);
    }
}
