@extends('layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('user.edit', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="small mb-1">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $user->nome }}">
        </div>
        <div class="form-group">
            <label class="small mb-1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label class="small mb-1">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>
        <label>Papel</label>
        <div class="form-group" value="{{ $user->usuario_role }}">
            <div class="form-check form-check-inline">
                @if($user->usuario_role === 1) 
                <input class="form-check-input" type="radio" name="usuario_role" value="1" checked>
                @else
                <input class="form-check-input" type="radio" name="usuario_role" value="1">
                @endif
                <label class="form-check-label">Autenticado</label>
            </div>
            <div class="form-check form-check-inline">
            @if($user->usuario_role === 2) 
                <input class="form-check-input" type="radio" name="usuario_role" value="2" checked>
                @else
                <input class="form-check-input" type="radio" name="usuario_role" value="2">
                @endif
                <label class="form-check-label">Comitê</label>
            </div>
            <div class="form-check form-check-inline">
            @if($user->usuario_role === 3) 
                <input class="form-check-input" type="radio" name="usuario_role" value="3" checked>
                @else
                <input class="form-check-input" type="radio" name="usuario_role" value="3">
                @endif
                <label class="form-check-label">Administrador</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
@endsection