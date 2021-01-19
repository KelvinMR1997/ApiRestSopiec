<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
            // 'cc' => 'required|min:5|Max:10|unique:users',
            // 'area'=> 'required|min:1|max:5',
            // 'firstName'=>'required|min:3|max:45|string',
            // 'secondName'=>'min:3|max:45|string',
            // 'fLastName'=> 'required|min:3|max:45|string',
            // 'sLastName'=> 'required|min:3|max:45|string',
            // 'email' => 'required|min:3|max:45|unique:users|string',
            // 'rol' => 'required|max:45|string',
            // 'permisos' => 'required|max:45|string',
            'password'=> 'required|min:8|string|'
        ];
    }
}
