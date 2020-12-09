<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\Planta;
use App\Receita;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReceitaController extends Controller
{
    public function index()
    {
        $receitas = Receita::all();

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas, 'error' => '', 'tipoPg' => 'todasReceitas','tipo' => ''
        ]);
    }
    public function minhasReceitas(){
        $user = Auth::user();
        $receitas = Receita::getPorUsuario($user);
        $error = (count($receitas) > 0)  ? '' : 'Não há receitas cadastradas';

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas, 'error' => $error, 'tipoPg' => 'minhasReceitas'
        ]);
    }
    public function receitaPorPlanta(Planta $planta){
        $receitas = $planta->receitas;
        $error = (count($receitas) > 0)  ? '' : 'Não há receitas cadastradas para essa planta';

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas, 'tipoPg' => 'todasReceitas', 'error' => $error
        ]);
    }

    public function create()
    {
        return view('publico.receitas.receita-add', ['erroEx' => '']);
    }

    public function store(ReceitaRequest $request)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $receita = new Receita();
            $receita->nome = $request->nome;
            $receita->tipo = $request->tipo;
            $receita->modoPreparo = $request->modoPreparo;
            $receita->observacao = $request->observacao;
            $receita->fotos = $request->fotos;
            $receita->porcoes = $request->porcoes;
            $receita->tempoPreparo = $request->tempoPreparo;

            $receita->usuarios_id = Auth::user()->id;

            if ($request->nomePlanta && $request->ingredientes && $request->quantidade && $request->quantidadePlanta) {
                $receita->save();
            } else {
                return view('publico.receitas.receita-add', [
                    'erroEx' => 'Campos ingredientes e planta são obrigatórios'
                ]);
            }

            $nomesPlantas = $request->nomePlanta;
            foreach ($nomesPlantas as $key => $nomePlanta) {
                $planta = Planta::where('nome', $nomePlanta)->first();
                $receita->plantas()->attach($planta, ['quantidade' => $request->quantidadePlanta[$key]]);
            }
            foreach ($request->ingredientes as $key => $ingredienteRequest) {
                $ingrediente = new Ingrediente();

                $ingrediente->nome = $ingredienteRequest;
                $ingrediente->quantidade = $request->quantidade[$key];
                $ingrediente->save();

                $ingrediente->receitas()->attach($receita->id);
            }
            return redirect()->route('receita.show', ['receita' => $receita]);
        }
        return redirect()->route('receita.index');
    }

    public function edit(Receita $receita){
        $ingredientes = $receita->ingredientes;

        if (Auth::user()) {
            return view('publico.receitas.receita-edit', [
                'receita' => $receita, 'ingredientes' => $ingredientes, 'erroEx' => ''
            ]);
        }
    }

    public function update(Receita $receita, ReceitaRequest $request)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $receita->nome = $request->nome;
            $receita->tipo = $request->tipo;
            $receita->modoPreparo = $request->modoPreparo;
            $receita->observacao = $request->observacao;
            $receita->fotos = $request->fotos;
            $receita->porcoes = $request->porcoes;
            $receita->tempoPreparo = $request->tempoPreparo;

            $receita->usuarios_id = Auth::user()->id;

            if ($request->nomePlanta && $request->ingredientes && $request->quantidade && $request->quantidadePlanta) {
                $receita->save();
                $receita->plantas()->detach();
                $receita->ingredientes()->delete();
            } else {
                return view('admin.forms.receita_edit', [
                    'receita' => $receita,
                    'ingredientes' => $receita->ingredientes,
                    'erroEx' => 'Campos ingredientes e planta são obrigatórios'
                ]);
            }

            $nomesPlantas = $request->nomePlanta;

            foreach ($nomesPlantas as $key => $nomePlanta) {
                $planta = Planta::where('nome', $nomePlanta)->first();
                $receita->plantas()->attach($planta, ['quantidade' => $request->quantidadePlanta[$key]]);
            }

            foreach ($request->ingredientes as $key => $ingredienteRequest) {
                $ingrediente = new Ingrediente();
                $ingrediente->nome = $ingredienteRequest;
                $ingrediente->quantidade = $request->quantidade[$key];

                $ingrediente->save();

                $ingrediente->receitas()->attach($receita->id);
            }
            return redirect()->route('receita.show', ['receita' => $receita]);
        }
        return redirect()->route('receita.index');
    }

    public function destroy(Receita $receita)
    {
        $user = Auth::user();

        if ($user->id == $receita->usuarios_id) {
            $receita->delete();
            return redirect()->route('receita.index');
        }

        return redirect()->route('receita.index');
    }

    public function show(Receita $receita){
        $ingredientes = $receita->ingredientes;
        $user = User::where('id', $receita->usuarios_id)->first();
        $tipo = ($receita->usuarios_id == $user->id) ? 'verReceitaDoUsuario' : 'verReceita';

        foreach ($receita->plantas as $planta) {
            $quantidadePlanta = $planta->pivot->quantidade;
        }
        $nomePlanta = DB::table('receitas')
            ->leftJoin('plantas_receitas', 'receitas.id', '=', 'plantas_receitas.receitas_id')
            ->leftJoin('plantas', 'plantas_receitas.plantas_id', '=', 'plantas.id')
            ->select('plantas.nome')
            ->where('receitas.id', 'LIKE', $receita->id)->get();

        return view('publico.receitas.receita-detail', [
            'receita' => $receita, 'usuario' => $user,
            'ingredientes' => $ingredientes, 'quantidade' => $quantidadePlanta,
            'nomePlantas' => $nomePlanta, 'tipoPg' => $tipo
        ]);
    }

    function fetchPlanta(Request $request){
        $nome = $request->get('query');
        $planta = Planta::where('nome', 'LIKE', "%{$nome}%")->get();
        return $planta;
    }

    public function search(Request $request)
    {
        $nome = $request->search;
        $tipos = $request->tipo ?? [];
        $tipo = [];

        $tipos = (count($tipos) > 0) ? $tipos : Receita::getTipos();
        
        $receitas = DB::table('receitas')
            ->leftJoin('plantas_receitas', 'receitas.id', '=', 'plantas_receitas.receitas_id')
            ->leftJoin('plantas', 'plantas_receitas.plantas_id', '=', 'plantas.id')
            ->leftJoin('nomes_populares', 'nomes_populares.plantas_id', '=', 'plantas.id')
            ->select('receitas.*')
            ->distinct()
            ->where('receitas.nome', 'LIKE', '%' . $nome . '%')
            ->whereIn('receitas.tipo', $tipos)
            ->orWhere(function($query) use($nome, $tipos){
                $query->where('plantas.nome', 'LIKE', '%' . $nome . '%')
                      ->whereIn('receitas.tipo', $tipos);
            })
            ->orWhere(function($query) use($nome, $tipos){
                $query->where('nomes_populares.nome', 'LIKE', '%' . $nome . '%')
                      ->whereIn('receitas.tipo', $tipos);
            })
            ->get();

        $error = (count($receitas) > 0)  ? '' : 'Não foi encontrada nenhuma receita que tenha esse nome ou uma planta com seus nomes populares que tenha receita';
        
        if (count($tipos) == 7){
            $tipo = [];
        } else {
            foreach($tipos as $tipe){
                if ($tipe == 'Doces e Bolos'){
                    $tipo[0] = 'Doces e Bolos';
                } else if ($tipe == 'Carnes'){
                    $tipo[1] = 'Carnes';
                } else if ($tipe == 'Saladas, Molhos e Acompanhamentos'){
                    $tipo[2] = 'Saladas, Molhos e Acompanhamentos';
                } else if ($tipe == 'Sopas'){
                    $tipo[3] = 'Sopas';
                } else if ($tipe == 'Massas'){
                    $tipo[4] = 'Massas';
                } else if ($tipe == 'Bebidas'){
                    $tipo[5] = 'Bebidas';
                } else if ($tipe == 'Prato principal'){
                    $tipo[6] = 'Prato principal';
                }
            }
        }

        return view('publico.receitas.receita-list', [
            'receitas' => $receitas,
            'nome' => $nome,
            'tipo' => $tipo ?? '',
            'tipoPg' => 'todasReceitas',
            'error' => $error
        ]);
    }
}
