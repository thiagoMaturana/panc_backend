<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public static function getAprovadas($nome = '%')
    {
        return DB::table('plantas')
            ->leftJoin('nomes_populares', 'nomes_populares.plantas_id', '=', 'plantas.id')
            ->select('plantas.*')
            ->distinct()
            ->where('plantas.nome', 'LIKE', '%' . $nome . '%')
            ->where('plantas.status', '=', 'aprovada')
            ->orWhere(function ($query) use ($nome) {
                $query->where('nomes_populares.nome', 'LIKE', '%' . $nome . '%')
                    ->where('plantas.status', '=', 'aprovada');
            })
            ->get();
    }

    public static function getPorUsuario($usuario)
    { //pegar todas as plantas do usuário
        if ($usuario) {
            return DB::table('plantas')
                ->distinct()
                ->where('plantas.usuarios_id', '=', $usuario->id)
                ->get();
        }
    }
    
    public static function getParaAnalise()
    { //pegar todas as plantas para análise do comite
        return DB::table('plantas')
            ->distinct()
            ->where('plantas.status', '=', 'submetida')
            ->get();
    }
}
