@extends('admin.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="small mb-1">Nome</label>
            <input type="text" minlength="3" maxlength="100" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{ $user->name }}" required>

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $user->email }}" required>

            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1">Senha</label>
            <input type="password" maxlength="50" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha">

            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
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