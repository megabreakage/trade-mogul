<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderStatus;
use Exception;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with(['order_status', 'location'])->get();
        return $orders ? OrderResource::collection($orders) :  new OrderResource([
            'status' => 'error',
            'message' => 'No records have been found'
        ]);
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->safe()->all();
        $location = Location::where('identifier', $validated['location'])->first();
        $destination = Location::where('identifier', $validated['destination'])->first();

        try {
            $order = Order::create([
                'identifier' => generate_identifier(),
                'order_status_id' => 1,
                'location_id' => $location->id,
                'destination_id' => $destination->id,
                'registration_number' => $validated['registration_number'],
                'model' => $validated['model'],
                'manufactured_at' => $validated['manufactured_at'],
            ]);
            return new OrderResource($order);
        } catch (Exception $e) {
            return new OrderResource([
                'status' => 'error',
                'message' => 'Order has not been added succesfully, Kindly try again.', 'errors' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $order = Order::where('identifier', $id)->first();
        return $order ? new OrderResource($order) : new OrderResource([
            'status' => 'error',
            'message' => 'No records have been found'
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::where('identifier', $id)->first();
        if ($order) {
            $validated = $request->safe()->all();
            $order_status = OrderStatus::find($validated['order_status_id']);
            $location = Location::find($validated['location_id']);
            $destination = Location::find($validated['destination_id']);

            try {
                $order->update([
                    'order_status_id' => $order_status->id,
                    'order_number' => $validated['order_number'],
                    'location_id' => $location->id,
                    'destination_id' => $destination->id,
                ]);
                return new OrderResource($order);
            } catch (Exception $e) {
                return new OrderResource([
                    'status' => 'error',
                    'message' => 'Truck has not been updated succesfully, Kindly try again.',
                    'errors' => $e->getMessage()
                ]);
            }
        }
        return new OrderResource([
            'status' => 'error',
            'message' => 'No matching record has been found'
        ]);
    }

    public function destroy($id)
    {
        $order = Order::where('identifier', $id)->first();
        if ($order) {
            // $order->delete();
            return new OrderResource([
                'status' => 'success', 'message' => 'Order ' . $order->order_number . ' has been deleted successfully.'
            ]);
        }
        return new OrderResource([
            'status' => 'error',
            'message' => 'No records have been found'
        ]);
    }
}
