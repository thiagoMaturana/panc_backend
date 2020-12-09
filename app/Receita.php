<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Receita extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    protected $fillable = [
        'nome', 'tipo', 'modoPreparo', 'observacao', 'fotos'
    ];


    /*
     * Relacionamentos:
     */

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function plantas()
	{
        return $this->belongsToMany(Planta::class, 'plantas_receitas', 'receitas_id', 'plantas_id')
            ->withPivot(['quantidade']);
    }
    
    public function ingredientes()
	{
		return $this->belongsToMany(Ingrediente::class, 'receitas_ingredientes', 'receitas_id', 'ingredientes_id');
    }
    
    public static function getPorUsuario($usuario)
    { //pegar todas as plantas do usuário
        if ($usuario) {
            return DB::table('receitas')
                ->distinct()
                ->where('receitas.usuarios_id', '=', $usuario->id)
                ->get();
        }
    }

    public static function getTipos(){
        return ['Doces e Bolos', 'Carnes', 'Saladas, Molhos e Acompanhamentos', 'Sopas', 'Massas', 'Bebidas', 'Prato principal'];
    }
}
