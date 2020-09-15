@extends('layout')

@section('content')


<div class="container-fluid">
    <h1 class="mt-4">PLANTAS</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <p>{{ $errors }}</p>
    </div>
    @endif
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Lista de Plantas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Nome Científico</th>
                            <th>Criador id</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plantas as $planta)
                        <tr>
                            <td> {{ $planta->id }} </td>
                            <td> {{ $planta->nome }} </td>
                            <td> {{ $planta->nomeCientifico }} </td>
                            <td> {{ $planta->usuarios_id }} </td>


                            <td class="text-center">
                                <form class="py-1" action="{{ route('planta.editForm', ['planta' => $planta->id]) }}" method="GET">
                                    <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                                </form>

                                <form class="py-1" action="{{ route('planta.destroy', ['planta' => $planta->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user" value="">
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