<?php
namespace App\Models;
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPut extends FormRequest
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
        // Obtener el id
        // dd($this->route('user')->id);

        return [
            // La linea .$this->route('user)->id Accede al id seleccionado  se concatena con la validación unique para especificar el id seleccionado.
             'cc' => 'required|min:5|Max:10|unique:users,cc,' .$this->route('user')->id,
            // 'area'=> 'required|min:1|max:5',
            // 'firstName'=>'required|min:3|max:45|string',
            // 'secondName'=>'min:3|max:45|string',
            // 'fLastName'=> 'required|min:3|max:45|string',
            // 'sLastName'=> 'required|min:3|max:45|string',
            'email' => 'string|required|min:3|max:45|unique:users,email,'.$this->route('user')->id,
            // 'password'=> 'required|confirmed|min:8|string|'
            // 'rol' => 'required|max:45|string',
            // 'permisos' => 'required|max:45|string',
        ];
    }
}
