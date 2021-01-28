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
    public function index()
    {
        $plantas = Planta::getAprovadas();

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas, 'tipo' => 'todasAsPlantas', 'error' => ''
        ]);
    }
    public function indexMinhasPlantas()
    {
        $user = Auth::user();
        if ($user) {
            $plantas = Planta::getPorUsuario($user);
            $error = (count($plantas) > 0)  ? '' : 'Não há plantas cadastradas';

            return view('publico.plantas.planta-list', [
                'plantas' => $plantas,
                'error' => $error,
                'tipo' => 'minhasPlantas'
            ]);
        }
        return redirect()->route('planta.index');
    }
    public function indexParaAnalise()
    {
        $user = Auth::user();
        $plantas = Planta::getParaAnalise();
        $error = (count($plantas) > 0)  ? '' : 'Não há plantas para análise';

        if ($user && ($user->isComite() || $user->isAdministrador())) {
            return view('publico.plantas.planta-list', [
                'plantas' => $plantas,
                'error' => $error,
                'tipo' => 'paraAnalise'
            ]);
        }
        return redirect()->route('planta.index');
    }

    public function create()
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            return view('publico.plantas.planta-add', ['erroEx' => '']);
        }
        return redirect()->route('planta.index');
    }

    public function store(PlantaRequest $request)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
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
                NomePopular::where('plantas_id', $planta->id)->delete();
            } else {
                $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
                return view('publico.plantas.planta-add', [
                    'erroEx' => 'Campo nomes populares é obrigatório'
                ]);
            }

            foreach ($request->nomesPopulares as $key => $nomePopularRequest) {
                $nomePopular = new NomePopular();
                $nomePopular->nome = $nomePopularRequest;
                $nomePopular->plantas_id = $planta->id;

                $nomePopular->save();
            }
            return redirect()->route('planta.show', ['planta' => $planta->id]);
        }
        return redirect()->route('planta.index');
    }

    public function edit(Planta $planta)
    {
        $user = Auth::user();
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();

        if ($user) {
            if (($user->id == $planta->usuarios_id && ($planta->status == "cadastrada" || $planta->status == "rejeitada")) || ($user->isComite() || $user->isAdministrador())) {
                return view('publico.plantas.planta-edit', [
                    'planta' => $planta,
                    'nomesPopulares' => $nomesPopulares,
                    'erroEx' => ''
                ]);
            }
        }
        return redirect()->route('planta.index');
    }

    public function update(Planta $planta, PlantaRequest $request)
    {
        $user = Auth::user();

        if (($user->id == $planta->usuarios_id && ($planta->status == "cadastrada" || $planta->status == 'rejeitada')) || ($user->isAdministrador() || $user->isComite())) {
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
            $planta->referencia = $request->referencia;

            if ($user->isComite() && $planta->status == 'aprovada') {
                $planta->status = 'submetida';
            } else if ($user->isAdministrador() && $planta->status == 'aprovada') {
                $planta->status = 'aprovada';
            }

            if ($request->nomesPopulares) {
                $planta->save();
                NomePopular::where('plantas_id', $planta->id)->delete();
            } else {
                $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
                return view('publico.plantas.planta-edit', [
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

            if ($user->isComite() && $planta->status == 'submetida') {
                return redirect()->route('planta.showParaAnalise', ['planta' => $planta->id]);
            }
            return redirect()->route('planta.show', ['planta' => $planta->id]);
        }
        return redirect()->route('planta.index');
    }

    public function destroy(Planta $planta)
    {
        $user = Auth::user();

        if ($user) {
            if ($user->id == $planta->usuarios_id && ($planta->status == 'cadastrada' || $planta->status == 'rejeitada')) {
                $planta->delete();
                return redirect()->route('planta.minhasPlantas');
            }
        }
        return redirect()->route('planta.index');
    }

    public function show(Planta $planta)
    {
        $user = Auth::user();
        $receitas = $planta->receitas;

        if ($user) {
            if ($planta->usuarios_id == $user->id) {
                $tipo =  'verPlantaCadastradaDoUsuario';
            } else if ($planta->status == 'aprovada') {
                $tipo =  'verPlanta';
            }
        } else {
            return redirect()->route('planta.index');
        }

        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        return view('publico.plantas.planta-detail', [
            'planta' => $planta, 'nomesPopulares' => $nomesPopulares, 'tipo' => $tipo,
            'receitas' => $receitas
        ]);
    }
    public function showParaAnalise(Planta $planta)
    {
        $user = Auth::user();
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        $receitas = $planta->receitas;

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            return view('publico.plantas.planta-detail', [
                'planta' => $planta, 'nomesPopulares' => $nomesPopulares, 'tipo' => 'verPlantaParaAnalise',
                'receitas' => $receitas
            ]);
        }
        return redirect()->route('planta.index');
    }


    public function search(Request $request)
    {
        $nome = $request->search;
        $plantas = Planta::getAprovadas($nome);
        $error = (count($plantas) > 0)  ? '' : 'Não foi encontrada nenhuma planta com nome, nome científico e nomes populares cadastradas';

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas, 'tipo' => 'todasAsPlantas', 'error' => $error
        ]);
    }


    public function aprovar(Planta $planta)
    {
        $user = Auth::user();
        if ($user && ($user->isAdministrador() || $user->isComite())) {
            $planta->status = 'aprovada';
            $planta->parecer = NULL;
            $planta->save();
        } else {
            return redirect()->route('planta.index');
        }

        return redirect()->route('planta.paraAnalise');
    }
    public function parecer(Request $request, Planta $planta)
    {
        $user = Auth::user();
        if ($user->isAdministrador() || $user->isComite()) {
            $planta->parecer = $request->parecer;
            $planta->status = 'rejeitada';
            $planta->save();
        } else {
            return redirect()->route('planta.index');
        }

        return redirect()->route('planta.paraAnalise');
    }
    public function submeter(Planta $planta)
    {
        $user = Auth::user();
        if ($user && ($user->id == $planta->usuarios_id) && ($planta->status == "cadastrada" || $planta->status == 'rejeitada')) {
            $planta->status = 'submetida';
            $planta->save();
        } else {
            return redirect()->route('planta.index');
        }

        return redirect()->route('planta.paraAnalise');
    }
}
