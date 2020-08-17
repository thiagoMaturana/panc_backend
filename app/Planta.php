<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = 'tb_planta';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function nomePopular()
    {
        return $this->hasMany(NomePopular::class, 'plantas_id', 'id');
    }

    public function receitas()
	{
		return $this->belongsToMany(Receita::class, 'plantas_receitas', 'plantas_id', 'receitas_id');
	}
}
