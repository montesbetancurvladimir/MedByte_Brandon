<?php

namespace App\Http\Requests\Usuario;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

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
            'nombre1' => "required",
            'apellido1' => "required",
            'apellido2' => "required",
            'celular' => "required",
            'numero_id'  => "required",
            'tarjeta_profesional'  => "required",
            'activo'  => "required",
            'email' => 'required|unique:users,email,'.$this->route('users.email'),
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }

    public function messages()
    {
        return [
            'nombre1.required' => 'Es requerido el nombre 1.',
            'apellido1.required' => "Es requerido el apellido 1.",
            'apellido1.required' => 'Es requerido el apellido 2.',
            'celular.required' => "Es requerido el número de celular.",
            'email.integer' => 'Es requerido el email.',
            'password.required' => "Es requerido el password.",
            'numero_id.required'  => "El número ID es requerido.",
            'tarjeta_profesional.required'  => "El número de la tarjeta profesional es requerido.",
            'activo.required'  => "Debe seleccionar el estado del usuario."
        ];
    }
}