<?php

namespace App\Http\Controllers;

use App\Planta;
use App\Receita;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function listAllPlantas()
    {
        $plantas = Planta::all();

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas
        ]);
    }

    public function listAllReceitas(){
        $receitas = Receita::all();

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas
        ]);
    }
}
