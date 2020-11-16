@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">

        <form action="{{ route('publico.planta.store') }}" method="POST">
            @csrf

            <!-- Nomes -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" minlength="3" maxlength="60" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" name="nome" value="{{old('nome')}}" required>
                    @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Nome Científico</label>
                    <input type="text" minlength="3" maxlength="100" class="form-control @error('nomeCientifico') is-invalid @enderror" placeholder="Nome Científico" name="nomeCientifico" value="{{old('nomeCientifico')}}" required>
                    @error('nomeCientifico')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            @if ($erroEx)
            <div class="alert alert-danger" role="alert">
                {{ $erroEx }}
            </div>
            @endif

            <label>Nomes populares</label>
            <table>
                <div id="dynamicTable">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <input type="text" minlength="3" maxlength="60" class="form-control @error('nomesPopulares.*') is-invalid @enderror" placeholder="Nome popular" name="nomesPopulares[0]" required>
                        </div>
                        @error('nomesPopulares.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-outline-danger remove-tr">Remover</button>
                        </div>
                    </div>
                </div>
            </table>
            <div class="form-group">
                <button type="button" class="btn btn-outline-success add" id="add">Adicionar nome popular</button>
            </div>

            <!-- Caracteristicas -->
            <div class="form-group">
                <label>Tamanho</label>
                <input type="text" class="form-control @error('tamanho') is-invalid @enderror" placeholder="Tamanho" name="tamanho" value="{{old('tamanho')}}" required>
                @error('tamanho')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Fruto</label>
                <textarea class="form-control" placeholder="Descreva o Fruto da planta, caso haja" rows="3" name="fruto">{{old('fruto')}}</textarea>
            </div>
            <div class="form-group">
                <label>Folha</label>
                <textarea class="form-control @error('folha') is-invalid @enderror" placeholder="Descreva a Folha da planta" rows="3" name="folha" required>{{old('folha')}}</textarea>
                @error('folha')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Caracteristícas</label>
                <textarea class="form-control" placeholder="Descreva a planta fisicamente e/ou fisiológicamente" rows="3" name="caracteristicas">{{old('caracteristicas')}}</textarea>
            </div>
            <!-- Classificação -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Familia</label>
                    <input type="text" minlength="3" maxlength="45" class="form-control @error('familia') is-invalid @enderror" placeholder="Familia da planta" value="{{old('familia')}}" name="familia" required>
                    @error('familia')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label>Genero</label>
                    <input type="text" minlength="3" maxlength="45" class="form-control @error('genero') is-invalid @enderror" value="{{old('genero')}}" placeholder="Genero da planta" name="genero" required>
                    @error('genero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label>Especie</label>
                    <input type="text" minlength="3" maxlength="45" class="form-control @error('especie') is-invalid @enderror" placeholder="Especie da planta" name="especie" value="{{old('especie')}}" required>
                    @error('especie')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!-- Propriedades -->
            <div class="form-group">
                <label>Propriedades Medicinais</label>
                <textarea class="form-control @error('propriedadesMedicinais') is-invalid @enderror" placeholder="Descreva as propriedades medicinais da planta" rows="3" name="propriedadesMedicinais" value="{{old('propriedadesMedicinais')}}" required></textarea>
                @error('propriedadesMedicinais')
                <div class="invalid-feedback">
                    {{$message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Propriedades Gastronômicas</label>
                <textarea class="form-control @error('nomeCientifico') is-invalid @enderror" placeholder="Descreva as propriedades gastronômicas da planta" rows="3" name="propriedadesCulinarias" value="{{old('propriedadesCulinarias')}}" required></textarea>
                @error('propriedadesCulinarias')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Cultivo -->
            <div class="form-group">
                <label>Cultivo</label>
                <textarea class="form-control" placeholder="Descreva o processo de cultivo da planta" rows="3" name="cultivo">{{old('cultivo')}}</textarea>
            </div>
            <!-- Avisos -->
            <div class="form-group">
                <label>Avisos</label>
                <textarea class="form-control" placeholder="Escreve os avisos sobre a planta, caso haja" rows="3" name="avisos">{{old('avisos')}}</textarea>
            </div>
            <!-- Foto -->
            <div class="form-group">
                <label>Foto</label>
                <input type="text" class="form-control @error('fotos') is-invalid @enderror" placeholder="Url da foto" name="fotos" value="{{old('fotos')}}" required>
                @error('fotos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    </div>
</section><!-- End Portfolio Section -->


<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<div class="form-row"><div class="form-group col-md-10"><input type="text" class="form-control @error("nomesPopulares.*") is-invalid @enderror" minlength="3" maxlength="60" placeholder="Nome popular" name="nomesPopulares[' + i + ']" required></div>@error("nomesPopulares.*")<div class="invalid-feedback">{{ $message }}</div>@enderror<div class="form-group col-md-2"><button type="button" class="btn btn-outline-danger remove-tr">Remover</button></div></div>');

    });

    $(document).on('click', '.remove-tr', function() {

        $(this).parents('div.form-row').remove();

    });
</script>
@endsection