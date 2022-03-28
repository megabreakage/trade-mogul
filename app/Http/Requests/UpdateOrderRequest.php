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
        return false;
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
            'location' => ['required', 'string'],
            'order_status' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'order_number.required' => 'Order number is required',
            'order_number.string' => 'Order number does not allow special characters',
            'location.required' => 'Location is required',
            'location.string' => 'Kindly select a location from the list provided.',
            'order_status.required' => 'Order status is required',
            'order_status.string' => 'Kindly select order status from the list provided.'
        ];
    }
}
