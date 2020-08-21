@extends('layout')

@section('content')
<div class="container p-5">
    <form>
        <!-- Nomes -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
                <label>Nome Científico</label>
                <input type="text" class="form-control" placeholder="Nome Científico">
            </div>
        </div>
        <!-- Caracteristicas -->
        <div class="form-group">
            <label>Tamanho</label>
            <input type="text" class="form-control" placeholder="Tamanho">
        </div>
        <div class="form-group">
            <label>Fruto</label>
            <textarea class="form-control" placeholder="Descreva o Fruto da planta, caso haja" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Folha</label>
            <textarea class="form-control" placeholder="Descreva a Folha da planta" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Caracteristícas</label>
            <textarea class="form-control" placeholder="Descreva a planta fisicamente e/ou fisiológicamente" rows="3"></textarea>
        </div>
        <!-- Classificação -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Familia</label>
                <input type="text" class="form-control" placeholder="Familia da planta">
            </div>
            <div class="form-group col-md-4">
                <label>Genero</label>
                <input type="text" class="form-control" placeholder="Genero da planta">
            </div>
            <div class="form-group col-md-4">
                <label>Especie</label>
                <input type="text" class="form-control" placeholder="Especie da planta">
            </div>
        </div>
        <!-- Propriedades -->
        <div class="form-group">
            <label>Propriedades Medicinais</label>
            <textarea class="form-control" placeholder="Descreva as propriedades medicinais da planta" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Propriedades Gastronômicas</label>
            <textarea class="form-control" placeholder="Descreva as propriedades gastronômicas da planta" rows="3"></textarea>
        </div>
        <!-- Cultivo -->
        <div class="form-group">
            <label>Cultivo</label>
            <textarea class="form-control" placeholder="Descreva o processo de cultivo da planta" rows="3"></textarea>
        </div>
        <!-- Avisos -->
        <div class="form-group">
            <label>Avisos</label>
            <textarea class="form-control" placeholder="Escreve os avisos sobre a planta, caso haja" rows="3"></textarea>
        </div>
        <!-- Foto -->
        <div class="form-group">
            <label>Foto</label>
            <input type="text" class="form-control" placeholder="Url da foto">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection