<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = 'tb_ingredientes';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
