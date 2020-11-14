<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ' required|min:3|max:100',
            'email' => 'required',
            'password' => 'max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Nome precisa de ter no minímo 3 caracteres',
            'name.max' => 'Nome precisa de ter no máximo 100 caracteres',
            'name.required' => 'Nome é obrigatório',

            'email.required' => 'Email é obrigatório',

            'password.max' => 'Senha precisa de ter no máximo 50 caracteres'
        ];
    }
}
