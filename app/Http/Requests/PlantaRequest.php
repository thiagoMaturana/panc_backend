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
            'nome' => 'required|max:45',
            'nomeCientifico' => 'required|max:50',
            'tamanho' => 'required',
            'folha' => 'required',
            'familia' => 'required|max:45',
            'genero' => 'required|max:45',
            'especie' => 'required|max:45',
            'propriedadesMedicinais' => 'required',
            'propriedadesCulinarias' => 'required',
            'fotos' => 'required|max:500',
        ];
    }
}
