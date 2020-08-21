<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'usuario_role', 'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha',
    ];

    /*
     * Relacionamentos:
     */

    public function receitas()
    {
        return $this->hasMany(Receita::class, 'usuarios_id', 'id');
    }

    public function plantas()
    {
        return $this->hasMany(Planta::class, 'usuarios_id', 'id');
    }
}
