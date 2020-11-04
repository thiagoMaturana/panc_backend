@extends('admin.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @if(isset($errors) && count($errors)>0)
        <div class="text-center alert-danger">
            @foreach($errors->all() as $erro)
            {{ $erro }} <br>
            @endforeach
        </div>
        @endif

        <div class="form-group">
            <label class="small mb-1">Nome</label>
            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label class="small mb-1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label class="small mb-1">Senha</label>
            <input type="password" class="form-control" name="password" placeholder="Senha">
        </div>
        <label>Papel</label>
        <div class="form-group" value="{{ $user->role }}">
            <div class="form-check form-check-inline">
                @if($user->role === 1)
                <input class="form-check-input" type="radio" name="role" value="1" checked required>
                @else
                <input class="form-check-input" type="radio" name="role" value="1">
                @endif
                <label class="form-check-label">Autenticado</label>
            </div>
            <div class="form-check form-check-inline">
                @if($user->role === 2)
                <input class="form-check-input" type="radio" name="role" value="2" checked>
                @else
                <input class="form-check-input" type="radio" name="role" value="2">
                @endif
                <label class="form-check-label">Comitê</label>
            </div>
            <div class="form-check form-check-inline">
                @if($user->role === 3)
                <input class="form-check-input" type="radio" name="role" value="3" checked>
                @else
                <input class="form-check-input" type="radio" name="role" value="3">
                @endif
                <label class="form-check-label">Administrador</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
@endsection