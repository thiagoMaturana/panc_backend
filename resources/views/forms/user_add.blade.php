@extends('layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="small mb-1">Nome</label>
            <input type="text" class="form-control" name="name" autofocus placeholder="Nome" required>
        </div>
        <div class="form-group">
            <label class="small mb-1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label class="small mb-1">Senha</label>
            <input type="password" class="form-control" name="password" placeholder="Senha" required>
        </div>
        <label>Papel</label>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="usuario_role" value="1" required>
                <label class="form-check-label">Autenticado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="usuario_role" value="2">
                <label class="form-check-label">Comitê</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="usuario_role" value="3">
                <label class="form-check-label">Administrador</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection