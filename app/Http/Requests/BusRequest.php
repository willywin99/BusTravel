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
        if ($this->method() == 'PUT') {
            // $name = 'required|unique:buses,name,' . $this->get('id');
            $license_plate = 'required|unique:buses,license_plate,' . $this->get('id');
        } else {
            // $name = 'required|unique:buses,name';
            $license_plate = 'required|unique:buses,license_plate';
        }
        return [
            'name' => 'required',
            'num_of_passenger' => 'required|numeric',
            'license_plate' => $license_plate,
            // 'picture' => 'required'
        ];
    }
}
