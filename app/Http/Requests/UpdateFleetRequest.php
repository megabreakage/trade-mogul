<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFleetRequest extends FormRequest
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
            'registration_number' => ['required', 'string'],
            'model' => ['required', 'string'],
            'manufactured_at' => ['required', 'date'],
            'availability_status' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'registration_number.required' => 'Registration number of the truck is required',
            'registration_number.string' => 'Registration number does not allow special characters',
            'model.required' => 'Truck model is required',
            'model.string' => 'Model number does not allow special characters',
            'manufactured_at.required' => 'Year of manufactured is required',
            'manufactured_at.date' => 'Year of manufacture is expected as a date.',
            'availability_status.required' => 'Availability status  is required',
            'availability_status.date' => 'Please select availability status from the list provided.',
        ];
    }
}