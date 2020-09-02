<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use App\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function listAllReceitas()
    {
        $receitas = Receita::all();

        return view('tables.receitas', [
            'receitas' => $receitas
        ]);
    }

    public function create()
    {
        return view('forms.receita_add');
    }

    public function store(Request $request)
    {
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

    public function editForm(Receita $receita)
    {
        $ingredientes = $receita->ingredientes;

        return view('forms.receita_edit', [
            'receita' => $receita,
            'ingredientes' =>$ingredientes
        ]);
    }

    public function edit(Receita $receita, Request $request){
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

    public function destroy(Receita $receita){
        $receita->delete();

        return redirect()->route('receita.listAll');
    }
}
