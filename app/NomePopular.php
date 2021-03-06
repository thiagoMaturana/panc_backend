<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomePopular extends Model
{

    protected $table = 'nomes_populares';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];

    /*
     * Relacionamentos:
     */

    public function plantas()
    {
        return $this->belongsTo(Planta::class);
    }
}
