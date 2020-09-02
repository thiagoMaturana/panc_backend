<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nome', 'quantidade'
    ];


    /*
     * Relacionamentos:
     */
    
    public function receitas()
	{
		return $this->belongsToMany(Receita::class, 'receitas_ingredientes', 'ingredientes_id', 'receitas_id');
	}
}
