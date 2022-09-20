<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    
    //Se cambia a true para autorizar las validaciones
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //Busca los name del formulario, que coinciden con el nombre de la BD en la tabla.
        return [
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}