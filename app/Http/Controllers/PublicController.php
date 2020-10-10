<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantaRequest;
use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\NomePopular;
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

    public function addForm()
    {
        return view('publico.plantas.planta-add');
    }

    public function store(PlantaRequest $request)
    {
        app(PlantaController::class)->store($request);
        return redirect()->route('publico.planta.listAll');
    }

    public function editForm(Planta $planta)
    {
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();

        return view('publico.plantas.planta-edit', [
            'planta' => $planta,
            'nomesPopulares' => $nomesPopulares
        ]);
    }

    public function edit(Planta $planta, PlantaRequest $request){
        app(PlantaController::class)->edit($planta, $request);
        return redirect()->route('publico.planta.listAll');
    }

    public function destroy(Planta $planta){
        app(PlantaController::class)->destroy($planta);
        return redirect()->route('publico.planta.listAll');
    }

    /*+++++++++++++++++++++++++++++++++++RECEITAS METÓDOS++++++++++++++++++++++++++++++++++++++++*/


    public function listAllReceitas()
    {
        $receitas = Receita::all();

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas
        ]);
    }

    public function addFormReceita()
    {
        return view('publico.receitas.receita-add');
    }

    public function storeReceita(ReceitaRequest $request)
    {
        app(ReceitaController::class)->store($request);
        return redirect()->route('publico.receita.listAll');
    }

    public function editFormReceita(Receita $receita)
    {
        $ingredientes = $receita->ingredientes;

        return view('publico.receitas.receita-edit', [
            'receita' => $receita,
            'ingredientes' => $ingredientes
        ]);
    }

    public function editReceita(Receita $receita, ReceitaRequest $request){
        app(ReceitaController::class)->edit($receita, $request);
        return redirect()->route('publico.receita.listAll');
    }

    public function destroyReceita(Receita $receita){
        app(ReceitaController::class)->destroy($receita);
        return redirect()->route('publico.receita.listAll');
    }

    public function detail(Planta $planta){
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        return view('publico.plantas.planta-detail', [
            'planta' => $planta,
            'nomesPopulares' => $nomesPopulares
        ]);
    }

    public function detailReceita(Receita $receita){
        $ingredientes = $receita->ingredientes;
        return view('publico.receitas.receita-detail', [
            'receita' => $receita,
            'ingredientes' => $ingredientes
        ]);
    }
}
