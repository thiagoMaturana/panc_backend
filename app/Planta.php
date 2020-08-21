<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nome', 'nomeCientifico', 'caracteristicas', 'tamanho', 'fruto', 'folha', 'familia', 'genero', 'especie', 'propriedadesMedicinais', 'propriedadesCulinarias', 'avisos', 'cultivo', 'fotos'
    ];

    /*
     * Relacionamentos:
     */

    public function nomePopular()
    {
        return $this->hasMany(NomePopular::class, 'plantas_id', 'id');
    }

    public function receitas()
	{
		return $this->belongsToMany(Receita::class, 'plantas_receitas', 'plantas_id', 'receitas_id');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
