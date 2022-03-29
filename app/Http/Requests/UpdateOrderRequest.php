<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_number' => ['required', 'string'],
            'location_id' => ['required', 'numeric', 'exists:locations,id'],
            'destination_id' => ['required', 'numeric', 'exists:locations,id'],
            'order_status_id' => ['required', 'numeric', 'exists:order_statuses,id'],
        ];
    }

    public function messages()
    {
        return [
            'order_number.required' => 'Order number is required',
            'order_number.string' => 'Order number does not allow special characters',

            'location.required' => 'Location is required',
            'location.string' => 'Kindly select a location from the list provided.',
            'location.exists' => 'The location selected does not exist.',

            'destination.required' => 'Destination is required',
            'destination.string' => 'Kindly select a destination from the list provided.',
            'destination.exists' => 'The destination selected does not exist.',

            'order_status_id.required' => 'Order status is required',
            'order_status_id.numeric' => 'Kindly select order status from the list provided.',
            'order_status_id.exists' => 'The status selected does not exist.'
        ];
    }
}
