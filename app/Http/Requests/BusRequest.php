<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusRequest extends FormRequest
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
        //     $name = 'required' . $this->get('id');
        //     $num_of_passenger = 'required' . $this->get('id');
        // } else {
        //     $passenger_name = 'required';
        //     $departure_time = 'required';
        // }
        return [
            'name' => 'required',
            'num_of_passenger' => 'required|numeric',
            'license_plate' => 'required',
            // 'picture' => 'required'
        ];
    }
}
