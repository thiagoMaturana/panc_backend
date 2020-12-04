<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\Planta;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReceitaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $receitas = Receita::all();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            return view('admin.tables.receitas', [
                'receitas' => $receitas
            ]);
        }
        return redirect()->route('publico.receita.index');
    }

    public function create(){}

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

            if($request->nomePlanta && $request->ingredientes && $request->quantidade && $request->quantidadePlanta){
                $receita->save();
            }

            $nomesPlantas = $request->nomePlanta;

            foreach ($nomesPlantas as $key => $nomePlanta){
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
            return redirect()->route('receita.index');
        }

        return redirect()->route('receita.index')->withErrors(['Voce precisa ser usuario autenticado para cadastrar receitas']);
    }

    public function edit(Receita $receita)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $ingredientes = $receita->ingredientes;

            return view('admin.forms.receita_edit', [
                'receita' => $receita,
                'ingredientes' => $ingredientes,
                'erroEx' => ''
            ]);
        }
        return redirect()->route('receita.index')->withErrors(['Voce precisa ser usuario autenticado para editar receitas']);
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

            if($request->nomePlanta && $request->ingredientes && $request->quantidade && $request->quantidadePlanta){
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

            foreach ($nomesPlantas as $key => $nomePlanta){
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
            return redirect()->route('receita.index');
        }
        return redirect()->route('receita.index')->withErrors(['Voce precisa ser usuario autenticado para editar receitas']);
    }

    public function destroy(Receita $receita)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $receita->delete();
            return redirect()->route('receita.index');
        }

        return redirect()->route('receita.index')->withErrors(['Voce precisa ser usuario autenticado para deletar receitas']);
    }

    function fetchPlanta(Request $request)
    {
        $nome = $request->get('query');
        $planta = Planta::where('nome', 'LIKE', "%{$nome}%")
            ->get();
        return $planta;
    }
}
