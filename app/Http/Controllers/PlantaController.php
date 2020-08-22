<?php

namespace App\Http\Controllers;

use App\Planta;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    public function listAllPlantas()
    {
        $plantas = Planta::all();

        return view('tables.plantas', [
            'plantas' => $plantas
        ]);
    }

    public function create()
    {
        return view('forms.planta_add');
    }

    public function store(Request $request)
    {
        $planta = new Planta();
        $planta->nome = $request->nome;
        $planta->nomeCientifico = $request->nomeCientifico;
        $planta->caracteristicas = $request->caracteristicas;
        $planta->tamanho = $request->tamanho;
        $planta->fruto = $request->fruto;
        $planta->folha = $request->folha;
        $planta->familia = $request->familia;
        $planta->genero = $request->genero;
        $planta->especie = $request->especie;
        $planta->propriedadesMedicinais = $request->propriedadesMedicinais;
        $planta->propriedadesCulinarias = $request->propriedadesCulinarias;
        $planta->avisos = $request->avisos;
        $planta->cultivo = $request->cultivo;
        $planta->fotos = $request->fotos;

        $planta->usuarios_id = 1;

        $planta->save();

        return redirect()->route('planta.listAll');
    }

    public function editForm(Planta $planta)
    {
        return view('forms.planta_edit', [
            'planta' => $planta
        ]);
    }

    public function edit(Planta $planta, Request $request){
        $planta->nome = $request->nome;
        $planta->nomeCientifico = $request->nomeCientifico;
        $planta->caracteristicas = $request->caracteristicas;
        $planta->tamanho = $request->tamanho;
        $planta->fruto = $request->fruto;
        $planta->folha = $request->folha;
        $planta->familia = $request->familia;
        $planta->genero = $request->genero;
        $planta->especie = $request->especie;
        $planta->propriedadesMedicinais = $request->propriedadesMedicinais;
        $planta->propriedadesCulinarias = $request->propriedadesCulinarias;
        $planta->avisos = $request->avisos;
        $planta->cultivo = $request->cultivo;
        $planta->fotos = $request->fotos;

        $planta->save();

        return redirect()->route('planta.listAll');
    }

    public function destroy(Planta $planta){
        $planta->delete();

        return redirect()->route('planta.listAll');
    }
}
