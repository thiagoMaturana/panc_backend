<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantaRequest;
use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\NomePopular;
use App\Planta;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function indexPlanta()
    {
        $plantas = Planta::all();

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas
        ]);
    }

    public function createPlanta()
    {
        return view('publico.plantas.planta-add');
    }

    public function storePlanta(PlantaRequest $request)
    {
        app(PlantaController::class)->store($request);
        return redirect()->route('publico.planta.index');
    }

    public function editPlanta(Planta $planta)
    {
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();

        if (Auth::user()) {
            return view('publico.plantas.planta-edit', [
                'planta' => $planta,
                'nomesPopulares' => $nomesPopulares
            ]);
        }
        return redirect()->route('publico.planta.index');
    }

    public function updatePlanta(Planta $planta, PlantaRequest $request)
    {
        app(PlantaController::class)->update($planta, $request);
        return redirect()->route('publico.planta.index');
    }

    public function destroyPlanta(Planta $planta)
    {
        app(PlantaController::class)->destroy($planta);
        return redirect()->route('publico.planta.index');
    }

    public function showPlanta(Planta $planta)
    {
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        return view('publico.plantas.planta-detail', [
            'planta' => $planta,
            'nomesPopulares' => $nomesPopulares
        ]);
    }

    public function searchPlanta(Request $request)
    {
        $nome = $request->search;

        $plantas = DB::table('plantas')->where('nome', 'LIKE', '%' . $nome . '%')->get();

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas
        ]);
    }

    /*+++++++++++++++++++++++++++++++++++RECEITAS METÓDOS++++++++++++++++++++++++++++++++++++++++*/


    public function indexReceita()
    {
        $receitas = Receita::all();

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas
        ]);
    }

    public function createReceita()
    {
        return view('publico.receitas.receita-add');
    }

    public function storeReceita(ReceitaRequest $request)
    {
        app(ReceitaController::class)->store($request);
        return redirect()->route('publico.receita.index');
    }

    public function editReceita(Receita $receita)
    {
        $ingredientes = $receita->ingredientes;

        if (Auth::user()) {
            return view('publico.receitas.receita-edit', [
                'receita' => $receita,
                'ingredientes' => $ingredientes
            ]);
        }

        return redirect()->route('publico.receita.index');
    }

    public function updateReceita(Receita $receita, ReceitaRequest $request)
    {
        app(ReceitaController::class)->update($receita, $request);
        return redirect()->route('publico.receita.index');
    }

    public function destroyReceita(Receita $receita)
    {
        app(ReceitaController::class)->destroy($receita);
        return redirect()->route('publico.receita.index');
    }


    public function showReceita(Receita $receita)
    {
        $ingredientes = $receita->ingredientes;
        return view('publico.receitas.receita-detail', [
            'receita' => $receita,
            'ingredientes' => $ingredientes
        ]);
    }


    public function searchReceita(Request $request)
    {
        $nome = $request->search;

        $receitas = DB::table('receitas')->where('nome', 'LIKE', '%' . $nome . '%')->get();

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas
        ]);
    }
}
