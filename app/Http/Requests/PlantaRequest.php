<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantaRequest extends FormRequest
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
            'nome' => 'required|max:60',
            'nomeCientifico' => 'required|max:100',
            'tamanho' => 'required',
            'folha' => 'required',
            'familia' => 'required|max:45',
            'genero' => 'required|max:45',
            'especie' => 'required|max:45',
            'propriedadesMedicinais' => 'required',
            'propriedadesCulinarias' => 'required',
            'fotos' => 'required',
            'referencia' => 'required',

            'nomesPopulares.*' => 'required|min:3|max:60',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.max' => 'Nome precisa de ter no máximo 60 caracteres',

            'familia.required' => 'Família é obrigatório',
            'familia.max' => 'Família precisa de ter no máximo 45 caracteres',

            'genero.required' => 'Genêro é obrigatório',
            'genero.max' => 'Genêro precisa de ter no máximo 45 caracteres',

            'especie.required' => 'Espécie é obrigatório',
            'especie.max' => 'Espécie precisa de ter no máximo 45 caracteres',

            'nomeCientifico.required' => 'Nome Científico é obrigatório',
            'nomeCientifico.max' => 'Nome Científico precisa de ter no máximo 100 caracteres',

            'nomesPopulares.*.required' => 'Nome é obrigatório',
            'nomesPopulares.*.min' => 'Nome precisa de ter no minímo 3 caracteres',
            'nomesPopulares.*.max' => 'Nome precisa de ter no máximo 60 caracteres',
            
            'tamanho.required' => 'Tamanho é obrigatório',
            'folha.required' => 'Folha é obrigatório',
            'propriedadesMedicinais.required' => 'Propriedades Medicinais é obrigatório',
            'propriedadesCulinarias.required' => 'Propriedades Culinarias é obrigatório',
            'fotos.required' => 'Foto é obrigatório',
            'referencia.required' => 'Referências são obrigatórias'
        ];
    }
}
