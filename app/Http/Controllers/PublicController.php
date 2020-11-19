<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantaRequest;
use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\NomePopular;
use App\Planta;
use App\Receita;
use ErrorException;
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
        return view('publico.plantas.planta-add', ['erroEx' => '']);
    }

    public function storePlanta(PlantaRequest $request)
    {
        try{
            app(PlantaController::class)->store($request);
        }catch (ErrorException $exception) {
            return view('publico.plantas.planta-add', ['erroEx' => 'Campo nomes populares é obrigatório']);
        }
        return redirect()->route('publico.planta.index');
    }

    public function editPlanta(Planta $planta)
    {
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();

        if (Auth::user()) {
            return view('publico.plantas.planta-edit', [
                'planta' => $planta,
                'nomesPopulares' => $nomesPopulares,
                'erroEx' => ''
            ]);
        }
        return redirect()->route('publico.planta.index');
    }

    public function updatePlanta(Planta $planta, PlantaRequest $request)
    {
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        try{
            app(PlantaController::class)->update($planta, $request);
        } catch (ErrorException $exception){
            return view('publico.plantas.planta-edit', [
                'planta' => $planta,
                'nomesPopulares' => $nomesPopulares,
                'erroEx' => 'Campo nomes populares é obrigatório'
            ]);
        }
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
        $plantas = DB::table('plantas')->where('nomeCientifico', 'LIKE', '%' . $nome . '%')->get();
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
        return view('publico.receitas.receita-add', ['erroEx' => '']);
    }

    public function storeReceita(ReceitaRequest $request)
    {
        try {
            app(ReceitaController::class)->store($request);
        } catch (ErrorException $exception) {
            return view('publico.receitas.receita-add', ['erroEx' => 'Campos ingredientes e planta são obrigatórios']);
        }
        return redirect()->route('publico.receita.index');
    }

    public function editReceita(Receita $receita)
    {
        $ingredientes = $receita->ingredientes;

        if (Auth::user()) {
            return view('publico.receitas.receita-edit', [
                'receita' => $receita,
                'ingredientes' => $ingredientes,
                'erroEx' => ''
            ]);
        }

        return redirect()->route('publico.receita.index');
    }

    public function updateReceita(Receita $receita, ReceitaRequest $request)
    {
        $ingredientes = $receita->ingredientes;
        try {
            app(ReceitaController::class)->update($receita, $request);
        } catch (ErrorException $exception) {
            return view('publico.receitas.receita-edit', [
                'receita' => $receita,
                'ingredientes' => $ingredientes,
                'erroEx' => 'Campos ingredientes e planta são obrigatórios']);
        }
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
        $tipos = $request->tipo;

        $receitas = DB::table('receitas')->where('nome', 'LIKE', '%' . $nome . '%')->get();

        if ($tipos){
            foreach($tipos as $tipo){
                $receitas = DB::table('receitas')->where('tipo', 'LIKE', '%'. $tipo . '%')->get();
            }
        }

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas,
            'nome' => $nome,
            'tipo' => $tipos
        ]);
    }
}
