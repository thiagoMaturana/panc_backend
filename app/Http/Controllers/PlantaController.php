<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantaRequest;
use App\NomePopular;
use App\Planta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantaController extends Controller
{
    public function listAllPlantas()
    {
        $user = Auth::user();
        $plantas = Planta::all();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            return view('admin.tables.plantas', [
                'plantas' => $plantas
            ]);
        }
        return redirect()->route('publico.planta.listAll');

    }

    public function create()
    {
        $user = Auth::user();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            return view('admin.forms.planta_add');
        }

        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser do comite ou um administrador para cadastrar plantas']);
    }

    public function store(PlantaRequest  $request)
    {
        $user = Auth::user();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
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

            foreach ($request->nomesPopulares as $key => $nomePopularRequest) {
                $nomePopular = new NomePopular();
                $nomePopular->nome = $nomePopularRequest;
                $nomePopular->plantas_id = $planta->id;

                $nomePopular->save();
            }

            return redirect()->route('planta.listAll');
        }
        return redirect()->route('planta.listAll')->withErrors(['Você precisa ser do comite ou um administrador para cadastrar plantas']);
    }

    public function editForm(Planta $planta)
    {

        $user = Auth::user();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();

            return view('admin.forms.planta_edit', [
                'planta' => $planta,
                'nomesPopulares' => $nomesPopulares
            ]);
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser do comite ou um administrador para editar plantas']);
    }

    public function edit(Planta $planta, PlantaRequest $request)
    {
        $user = Auth::user();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
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

            NomePopular::where('plantas_id', $planta->id)->delete();

            foreach ($request->nomesPopulares as $nomePopularRequest) {
                $nomePopular = new NomePopular();
                $nomePopular->nome = $nomePopularRequest;
                $nomePopular->plantas_id = $planta->id;
                $nomePopular->save();
            }

            return redirect()->route('planta.listAll');
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser do comite ou um administrador para cadastrar plantas']);
    }

    public function destroy(Planta $planta)
    {
        $user = Auth::user();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            $planta->delete();

            return redirect()->route('planta.listAll');
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser do comite ou um administrador para deletar plantas']);
    }
}
