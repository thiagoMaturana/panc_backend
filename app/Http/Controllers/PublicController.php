<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantaRequest;
use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\NomePopular;
use App\Planta;
use App\Receita;
use App\User;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function indexPlanta()
    {
        $user = Auth::user();
        $plantas = Planta::getAprovadas();

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas,
            'tipo' => 'todasAsPlantas',
            'error' => ''
        ]);
    }

    public function indexMinhasPlantas()
    {
        $user = Auth::user();
        $plantas = Planta::getPorUsuario($user);
        $error = (count($plantas) > 0)  ? '' : 'Não há plantas cadastradas';

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas,
            'error' => $error,
            'tipo' => 'minhasPlantas'
        ]);
    }

    public function indexParaAnalise()
    {
        $user = Auth::user();
        $plantas = Planta::getParaAnalise();
        $error = (count($plantas) > 0)  ? '' : 'Não há plantas para análise';

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas,
            'error' => $error,
            'tipo' => 'paraAnalise'
        ]);
    }

    public function createPlanta()
    {
        return view('publico.plantas.planta-add', ['erroEx' => '']);
    }

    public function storePlanta(PlantaRequest $request)
    {
        try {
            app(PlantaController::class)->store($request);
        } catch (ErrorException $exception) {
            return view('publico.plantas.planta-add', ['erroEx' => 'Campo nomes populares é obrigatório']);
        }

        $planta = Planta::where('nome', $request->nome)->first();

        return $this->showPlanta($planta);
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
        $user = Auth::user();
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        try {
            app(PlantaController::class)->update($planta, $request);
        } catch (ErrorException $exception) {
            return view('publico.plantas.planta-edit', [
                'planta' => $planta,
                'nomesPopulares' => $nomesPopulares,
                'erroEx' => 'Campo nomes populares é obrigatório'
            ]);
        }
        if ($user->isComite() && $planta->status == 'submetida') {
            return $this->showPlantaParaAnalise($planta);
        }
        return $this->showPlanta($planta);
    }

    public function destroyPlanta(Planta $planta)
    {
        app(PlantaController::class)->destroy($planta);
        return redirect()->route('publico.planta.indexMinhasPlantas');
    }

    public function showPlanta(Planta $planta)
    {
        $user = Auth::user();
        $tipo = ($planta->usuarios_id == $user->id) ? 'verPlantaCadastradaDoUsuario' : 'verPlanta';

        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        return view('publico.plantas.planta-detail', [
            'planta' => $planta,
            'nomesPopulares' => $nomesPopulares,
            'tipo' => $tipo
        ]);
    }

    public function showPlantaParaAnalise(Planta $planta)
    {
        $nomesPopulares = NomePopular::where('plantas_id', $planta->id)->get();
        return view('publico.plantas.planta-detail', [
            'planta' => $planta,
            'nomesPopulares' => $nomesPopulares,
            'tipo' => 'verPlantaParaAnalise'
        ]);
    }

    public function searchPlanta(Request $request)
    {
        $nome = $request->search;

        $plantas = Planta::getAprovadas($nome);

        return view('publico.plantas.planta-list', [
            'plantas' => $plantas,
            'tipo' => 'todasAsPlantas',
            'error' => ''
        ]);
    }

    public function aprovarPlanta(Planta $planta)
    {
        $planta->status = 'aprovada';
        $planta->parecer = NULL;
        $planta->save();

        return redirect()->route('publico.planta.indexParaAnalise');
    }

    public function rejeitarPlanta(Planta $planta)
    {
        $planta->status = 'rejeitada';
        $planta->save();

        return redirect()->route('publico.planta.indexParaAnalise');
    }

    public function submeterPlanta(Planta $planta)
    {
        $planta->status = 'submetida';
        $planta->save();

        return redirect()->route('publico.planta.indexParaAnalise');
    }
    /*+++++++++++++++++++++++++++++++++++RECEITAS METÓDOS++++++++++++++++++++++++++++++++++++++++*/


    public function indexReceita()
    {
        $receitas = Receita::all();

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas,
            'error' => '',
            'tipoPg' => 'todasReceitas'
        ]);
    }

    public function indexMinhasReceitas()
    {
        $user = Auth::user();
        $receitas = Receita::getPorUsuario($user);
        $error = (count($receitas) > 0)  ? '' : 'Não há receitas cadastradas';

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas,
            'error' => $error,
            'tipoPg' => 'minhasReceitas'
        ]);
    }

    public function indexReceitaPorPlanta(Planta $planta)
    {
        $receitas = $planta->receitas;

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
                'erroEx' => 'Campos ingredientes e planta são obrigatórios'
            ]);
        }
        return redirect()->route('publico.receita.index');
    }

    public function destroyReceita(Receita $receita)
    {
        app(ReceitaController::class)->destroy($receita);
        return redirect()->route('publico.receita.index');
    }


    public function showReceita(Receita $receita){
        $ingredientes = $receita->ingredientes;

        $user = User::where('id', $receita->usuarios_id)->first();

        foreach ($receita->plantas as $planta) {
            $quantidadePlanta = $planta->pivot->quantidade;
        }
        $nomePlanta = DB::table('receitas')
            ->leftJoin('plantas_receitas', 'receitas.id', '=', 'plantas_receitas.receitas_id')
            ->leftJoin('plantas', 'plantas_receitas.plantas_id', '=', 'plantas.id')
            ->select('plantas.nome')
            ->where('receitas.id', 'LIKE', $receita->id)->get();

        return view('publico.receitas.receita-detail', [
            'receita' => $receita,
            'usuario' => $user,
            'ingredientes' => $ingredientes,
            'quantidade' => $quantidadePlanta,
            'nomePlantas' => $nomePlanta,
            'tipoPg' => 'todasReceitas'
        ]);
    }

    public function showReceitaMinhasReceita(Receita $receita)
    {
        $ingredientes = $receita->ingredientes;

        foreach ($receita->plantas as $planta) {
            $quantidadePlanta = $planta->pivot->quantidade;
        }
        $nomePlanta = DB::table('receitas')
            ->leftJoin('plantas_receitas', 'receitas.id', '=', 'plantas_receitas.receitas_id')
            ->leftJoin('plantas', 'plantas_receitas.plantas_id', '=', 'plantas.id')
            ->select('plantas.nome')
            ->where('receitas.id', 'LIKE', $receita->id)->get();

        return view('publico.receitas.receita-detail', [
            'receita' => $receita,
            'ingredientes' => $ingredientes,
            'quantidade' => $quantidadePlanta,
            'nomePlantas' => $nomePlanta,
            'tipoPg' => 'minhasReceitas'
        ]);
    }


    public function searchReceita(Request $request)
    {
        $nome = $request->search;
        $tipos = $request->tipo;

        $receitas = DB::table('receitas')
            ->leftJoin('plantas_receitas', 'receitas.id', '=', 'plantas_receitas.receitas_id')
            ->leftJoin('plantas', 'plantas_receitas.plantas_id', '=', 'plantas.id')
            ->leftJoin('nomes_populares', 'nomes_populares.plantas_id', '=', 'plantas.id')
            ->select('receitas.*')
            ->distinct()
            ->where('receitas.nome', 'LIKE', '%' . $nome . '%')
            ->orWhere('plantas.nome', 'LIKE', '%' . $nome . '%')
            ->orWhere('nomes_populares.nome', 'LIKE', '%' . $nome . '%')
            ->get();

        if ($tipos) {
            foreach ($tipos as $tipo) {
                $receitas = DB::table('receitas')->where('receitas.tipo', 'LIKE', '%' . $tipo . '%')->get();
            }
        }

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas,
            'nome' => $nome,
            'tipo' => $tipos,
            'tipoPg' => 'todasReceitas'
        ]);
    }
}
