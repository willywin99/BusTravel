<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            $name = 'required|unique:drivers,name,' . $this->get('id');
            $id_card_number = 'required|unique:drivers,id_card_number,' . $this->get('id');
        } else {
            $name = 'required|unique:drivers,name';
            $id_card_number = 'required|unique:drivers,id_card_number';
        }
        return [
            'name' => $name,
            'id_card_number' => $id_card_number,
            'address' => 'required',
            // 'picture' => 'required'
        ];
    }
}
