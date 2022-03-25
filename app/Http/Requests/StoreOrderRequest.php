<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'location' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'order_number.required' => 'Order number is required',
            'order_number.string' => 'Order number does not allow special characters',
            'location.required' => 'Location is required',
            'location.string' => 'Kindly select a location from the list provided.'
        ];
    }
}
