<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceitaRequest;
use App\Ingrediente;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceitaController extends Controller
{
    public function listAllReceitas()
    {
        $user = Auth::user();
        $receitas = Receita::all();

        if ($user && ($user->isAdministrador() || $user->isComite())) {
            return view('admin.tables.receitas', [
                'receitas' => $receitas
            ]);
        }
        return redirect()->route('publico.receita.listAll');
    }

    public function create()
    {
        $user = Auth::user();
        if ($user && ($user->isAdministrador() || $user->isComite())) {
            return view('admin.forms.receita_add');
        }
        return redirect()->route('publico.receita.listAll');
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

            $receita->usuarios_id = 1;
            $receita->save();

            foreach ($request->ingredientes as $key => $ingredienteRequest) {
                $ingrediente = new Ingrediente();

                $ingrediente->nome = $ingredienteRequest;
                $ingrediente->quantidade = $request->quantidade[$key];

                $ingrediente->save();

                $ingrediente->receitas()->attach($receita->id);
            }


            return redirect()->route('receita.listAll');
        }

        return redirect()->route('receita.listAll')->withErrors(['Voce precisa ser usuario autenticado para cadastrar receitas']);
    }

    public function editForm(Receita $receita)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $ingredientes = $receita->ingredientes;

            return view('admin.forms.receita_edit', [
                'receita' => $receita,
                'ingredientes' => $ingredientes
            ]);
        }
        return redirect()->route('receita.listAll')->withErrors(['Voce precisa ser usuario autenticado para editar receitas']);
    }

    public function edit(Receita $receita, ReceitaRequest $request)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $receita->nome = $request->nome;
            $receita->tipo = $request->tipo;
            $receita->modoPreparo = $request->modoPreparo;
            $receita->observacao = $request->observacao;
            $receita->fotos = $request->fotos;

            $receita->usuarios_id = 1;

            $receita->save();


            $receita->ingredientes()->delete();

            foreach ($request->ingredientes as $key => $ingredienteRequest) {
                $ingrediente = new Ingrediente();
                $ingrediente->nome = $ingredienteRequest;
                $ingrediente->quantidade = $request->quantidade[$key];

                $ingrediente->save();

                $ingrediente->receitas()->attach($receita->id);
            }
            return redirect()->route('receita.listAll');
        }
        return redirect()->route('receita.listAll')->withErrors(['Voce precisa ser usuario autenticado para editar receitas']);
    }

    public function destroy(Receita $receita)
    {
        $user = Auth::user();

        if ($user && Auth::check()) {
            $receita->delete();
            return redirect()->route('receita.listAll');
        }

        return redirect()->route('receita.listAll')->withErrors(['Voce precisa ser usuario autenticado para deletar receitas']);
    }
}
