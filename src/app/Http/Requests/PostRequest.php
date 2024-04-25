<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'titulo' => [
                'required',
                'string',
                'max:200'
            ],
            'contenido' => [
                'required',
                'string'
            ]
        ];
    }

    protected function passedValidation()
    {
        parent::passedValidation();
        $this->merge(['creado_por' => auth()->id()]);
    }
}
