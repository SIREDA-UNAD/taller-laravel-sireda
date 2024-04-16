<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:128',
                'min:1'
            ],
            'correo' => [
                'required',
                'email:rfc',
                Rule::unique(Usuario::class, 'correo')->ignore($this->input('id'))
            ],
            'puede_postear' => [
                'nullable',
                'sometimes',
                'boolean'
            ],
            'puede_crear_usuario' => [
                'nullable',
                'sometimes',
                'boolean'
            ],
            'clave' => [
                'nullable',
                Rule::requiredIf(function () {
                    return $this->input('id') == null;
                }),
                'max:128'
            ]
        ];
    }

    protected function passedValidation()
    {
        parent::passedValidation();
        if ($this->input('clave')) {
            $this->merge(['clave' => Hash::make($this->input('clave'))]);
        }
    }

    public function attributes()
    {
        return [
            'correo' => 'dirección de correo electrónico'
        ];
    }

    public function messages()
    {
        return [
            'correo.email' => 'El campo de :attribute es inválido.',
            'nombre.min' => 'El campo de :attribute no cumple con la cantidad mínima de 2 caracteres.'
        ];
    }
}
