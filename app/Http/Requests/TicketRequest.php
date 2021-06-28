<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            $passenger_name = 'required|unique:tickets,passenger_name,' . $this->get('id');
            // $departure_time = 'required|unique:tickets,departure_time,' . $this->get('id');
        } else {
            $passenger_name = 'required';
            // $departure_time = 'required';
        }
        return [
            'passenger_name' => $passenger_name,
            // 'departure_time' => $departure_time,
            'departure_time' => 'required',
            'price' => 'required|numeric',
        ];
    }
}
