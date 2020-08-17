<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'tb_receita';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function plantas()
	{
		return $this->belongsToMany(Receita::class, 'plantas_receitas', 'receitas_id', 'plantas_id');
    }
    
    public function ingredientes()
	{
		return $this->belongsToMany(Ingrediente::class, 'receitas_ingredientes', 'receitas_id', 'ingredientes_id');
	}
    
}
