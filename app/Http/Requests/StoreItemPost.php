<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemPost extends FormRequest
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
            // 'serial' => 'required|min:3|unique:items',
            // 'marca' => 'required|min:2',
            // 'nombre' => 'required|min:3|Max:50',
            // 'tipo' => 'required|min:3|Max:50',
            // 'procesador' => 'required|min:3|Max:50',
            // 'ram' => 'required|min:3|Max:50',
            // 'disco_duro' => 'required|min:3|Max:50',
            // 'sistema_operativo' => 'required|min:3|Max:50',
            // 'estado_equipo' => 'required|min:3|Max:50',
        ];
    }
}
