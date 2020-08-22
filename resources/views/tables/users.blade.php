@extends('layout')

@section('content')
<div class="container-fluid py-5 table-responsive">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Lista de Usuários
        </div>
        <div class="card-body">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Papel</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row"> {{$user->id}} </th>
                        <td> {{$user->nome}} </td>
                        <td> {{$user->email}} </td>
                        <td>
                            @if($user->usuario_role == '1') Autenticado @endif
                            @if($user->usuario_role == '2') Comitê @endif
                            @if($user->usuario_role == '3') Administrador @endif
                        </td>
                        <td> ************** </td>
                        <td  class="text-center">
                            
                            <a type="submit" class="btn btn-outline-success" href="">Visualizar</a>

                            <a type="submit" class="btn btn-outline-primary" href="{{ route('user.editForm', ['user' => $user->id]) }}">Editar</a>

                            <form class="py-1" action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="user" value="{{ $user->id }}">
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
@endsection