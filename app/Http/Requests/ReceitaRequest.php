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
        $rules = [
            'nome' => 'required|min:3',
            'tipo' => 'required',
            'modoPreparo' => 'required',
            'fotos' => 'required',
            'quantidadePlanta.*' => 'required',
            'quantidade.*' => 'required',
            'ingredientes.*' => 'required|min:3|max:60',
            'nomePlanta.*' => 'required|min:3|max:60'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Nome precisa de ter no minímo 3 caracteres',

            'tipo.required' => 'Tipo é obrigatório',

            'modoPreparo.required' => 'Modo de Preparo é obrigatório',

            'fotos.required' => 'Foto é obrigatória',

            'quantidadePlanta.*.required' => 'Quantidade é obrigatória',

            'quantidade.*.required' => 'Quantidade é obrigatória',

            'ingredientes.*.required' => 'Ingrediente é obrigatório',
            'ingredientes.*.min' => 'Ingrediente precisa de ter no minímo 3 caracteres',
            'ingredientes.*.max' => 'Ingrediente precisa de ter no máximo 60 caracteres',

            'nomePlanta.*.required' => 'Nome é obrigatório',
            'nomePlanta.*.min' => 'Nome precisa de ter no minímo 3 caracteres',
            'nomePlanta.*.max' => 'Nome precisa de ter no máximo 60 caracteres',

        ];
    }
}
