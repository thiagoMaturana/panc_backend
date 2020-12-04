<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantaRequest;
use App\NomePopular;
use App\Planta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlantaController extends Controller
{
    public function index() //index
    {
        $user = Auth::user();
        $plantas = Planta::getAprovadas();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            $plantas = Planta::all();
            return view('admin.tables.plantas', [
                'plantas' => $plantas
            ]);
        }
        return redirect()->route('publico.planta.index');
    }

    public function create()
    {
    }

    public function store(PlantaRequest $request)
    {
        $user = Auth::user();

        if ($user) {
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
            $planta->status = 'cadastrada';
            $planta->referencia = $request->referencia;

            $planta->usuarios_id = Auth::user()->id;

            if ($request->nomesPopulares) {
                $planta->save();
            }

            foreach ($request->nomesPopulares as $key => $nomePopularRequest) {
                $nomePopular = new NomePopular();
                $nomePopular->nome = $nomePopularRequest;
                $nomePopular->plantas_id = $planta->id;

                $nomePopular->save();
            }

            return redirect()->route('planta.index');
        }
        return redirect()->route('planta.index')->withErrors(['Você precisa ser do comite ou um administrador para cadastrar plantas']);
    }

    public function edit(Planta $planta)
    {
        $user = Auth::user();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();

            return view('admin.forms.planta_edit', [
                'planta' => $planta,
                'nomesPopulares' => $nomesPopulares,
                'erroEx' => ''
            ]);
        }
        return redirect()->route('planta.index')->withErrors(['Voce precisa ser do comite ou um administrador para editar plantas']);
    }

    public function update(Planta $planta, PlantaRequest $request)
    {
        $user = Auth::user();

        if (($user->id == $planta->usuarios_id && ($planta->status=="cadastrada" || $planta->status =='rejeitada') ) || ($user->isAdministrador() || $user->isComite())) {
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
            if ($user->isComite() && $user->id != $planta->usuarios_id && $planta->status != 'submetida'){
                $planta->status = 'aprovada';
            }
            $planta->referencia = $request->referencia;

            if ($request->nomesPopulares) {
                $planta->save();
                NomePopular::where('plantas_id', $planta->id)->delete();
            } else {
                $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
                return view('admin.forms.planta_edit', [
                    'planta' => $planta,
                    'nomesPopulares' => $nomesPopulares,
                    'erroEx' => 'Campo nomes populares é obrigatório'
                ]);
            }

            foreach ($request->nomesPopulares as $nomePopularRequest) {
                $nomePopular = new NomePopular();
                $nomePopular->nome = $nomePopularRequest;
                $nomePopular->plantas_id = $planta->id;
                $nomePopular->save();
            }

            return redirect()->route('planta.index');
        }
        return redirect()->route('planta.index')->withErrors(['Voce precisa ser do comite ou um administrador para cadastrar plantas']);
    }

    public function destroy(Planta $planta)
    {
        $user = Auth::user();

        if (($user->id == $planta->usuarios_id && ($planta->status=="cadastrada" || $planta->status =='rejeitada') ) || ($user->isAdministrador() || $user->isComite())) {
            
            $planta->delete();

            return redirect()->route('planta.index');
        }
        return redirect()->route('planta.index')->withErrors(['Voce precisa ser do comite ou um administrador para deletar plantas']);
    }
}
