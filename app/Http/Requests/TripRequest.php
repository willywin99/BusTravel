<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
        // if ($this->method() == 'PUT') {

        // } else {

        // }

        return [
            'from' => 'required',
            'to' => 'required',
            'depart_date' => 'required',
            'depart_time' => 'required',
            'bus_id' => 'required',
            'driver_id' => 'required'
            // 'qty' => 'required'
        ];
    }
}
