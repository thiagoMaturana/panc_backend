<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceitaRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'tipo' => 'required|max:255',
            'modoPreparo' => 'required|max:255',
            'observacao' => 'max:255',
            'fotos' => 'required|max:255'
        ];
    }
}
