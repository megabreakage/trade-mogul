<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Location;
use App\Models\Order;
use Exception;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {
        $this->data['orders'] = Order::get();
        return view('orders', $this->data);
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->safe()->all();
        $location = Location::where('identifier', $validated['location'])->first();

        try {
            $truck = Order::create([
                'identifier' => Str::uuid(),
                'order_status_id' => 1,
                'location_id' => $location->id,
                'registration_number' => $validated['registration_number'],
                'model' => $validated['model'],
                'year_of_manufacture' => $validated['year_of_manufacture'],
            ]);
            return new OrderResource($truck);
        } catch (Exception $e) {
            return new OrderResource(['status' => 'error', 'message' => 'Order has not been added succesfully, Kindly try again.', 'errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $order = Order::where('identifier', $id)->first();
        return OrderResource::collection($order);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateOrderRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
