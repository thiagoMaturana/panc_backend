@extends('layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('planta.store') }}" method="POST">
        @csrf
        <!-- Nomes -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome" name="nome">
            </div>
            <div class="form-group col-md-6">
                <label>Nome Científico</label>
                <input type="text" class="form-control" placeholder="Nome Científico" name="nomeCientifico">
            </div>
        </div>
        <!-- Caracteristicas -->
        <div class="form-group">
            <label>Tamanho</label>
            <input type="text" class="form-control" placeholder="Tamanho" name="tamanho">
        </div>
        <div class="form-group">
            <label>Fruto</label>
            <textarea class="form-control" placeholder="Descreva o Fruto da planta, caso haja" rows="3" name="fruto"></textarea>
        </div>
        <div class="form-group">
            <label>Folha</label>
            <textarea class="form-control" placeholder="Descreva a Folha da planta" rows="3" name="folha"></textarea>
        </div>
        <div class="form-group">
            <label>Caracteristícas</label>
            <textarea class="form-control" placeholder="Descreva a planta fisicamente e/ou fisiológicamente" rows="3" name="caracteristicas"></textarea>
        </div>
        <!-- Classificação -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Familia</label>
                <input type="text" class="form-control" placeholder="Familia da planta" name="familia">
            </div>
            <div class="form-group col-md-4">
                <label>Genero</label>
                <input type="text" class="form-control" placeholder="Genero da planta" name="genero">
            </div>
            <div class="form-group col-md-4">
                <label>Especie</label>
                <input type="text" class="form-control" placeholder="Especie da planta" name="especie">
            </div>
        </div>
        <!-- Propriedades -->
        <div class="form-group">
            <label>Propriedades Medicinais</label>
            <textarea class="form-control" placeholder="Descreva as propriedades medicinais da planta" rows="3" name="propriedadesMedicinais"></textarea>
        </div>
        <div class="form-group">
            <label>Propriedades Gastronômicas</label>
            <textarea class="form-control" placeholder="Descreva as propriedades gastronômicas da planta" rows="3" name="propriedadesCulinarias"></textarea>
        </div>
        <!-- Cultivo -->
        <div class="form-group">
            <label>Cultivo</label>
            <textarea class="form-control" placeholder="Descreva o processo de cultivo da planta" rows="3" name="cultivo"></textarea>
        </div>
        <!-- Avisos -->
        <div class="form-group">
            <label>Avisos</label>
            <textarea class="form-control" placeholder="Escreve os avisos sobre a planta, caso haja" rows="3" name="avisos"></textarea>
        </div>
        <!-- Foto -->
        <div class="form-group">
            <label>Foto</label>
            <input type="text" class="form-control" placeholder="Url da foto" name="fotos">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection