@extends('layout')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">RECEITAS</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Lista de Receitas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        @foreach($receitas as $receita)
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Usuário id</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$receita->id}} </td>
                            <td> {{$receita->nome}} </td>
                            <td> {{$receita->tipo}} </td>
                            <td> {{$receita->usuarios_id}} </td>
                            <td class="text-center">
                                <a type="submit" class="btn btn-outline-success" href="">Visualizar</a>

                                <a type="submit" class="btn btn-outline-primary" href="{{ route('receita.editForm', ['receita' => $receita->id]) }}">Editar</a>

                                <form class="py-1" action="{{ route('receita.destroy', ['receita' => $receita->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="receita" value="{{ $receita->id }}">
                                    <input type="submit" class="btn btn-outline-danger" value="Remover">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection