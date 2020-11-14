@extends('admin.layout')

@section('content')
<div class="container p-5">

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="small mb-1">Nome</label>
            <input type="text" minlength="3" maxlength="100" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" autofocus placeholder="Nome" required>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1">Email</label>
            <input type="email" maxlength="255" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email')}}" required>
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1">Senha</label>
            <input type="password" minlength="3" maxlength="50" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha" required>
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <label>Papel</label>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" value="1" required>
                <label class="form-check-label">Autenticado</label>
            </div>
            <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="role" value="2">
                <label class="form-check-label">Comitê</label>
            </div>
            <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="role" value="3">
                <label class="form-check-label">Administrador</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection