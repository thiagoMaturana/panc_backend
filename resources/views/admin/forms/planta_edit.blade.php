@extends('admin.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('planta.update', ['planta' => $planta->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nomes -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" minlength="3" maxlength="60" class="form-control" placeholder="Nome" name="nome" value="{{ $planta->nome }}" required>
            </div>
            <div class="form-group col-md-6">
                <label>Nome Científico</label>
                <input type="text" minlength="3" maxlength="100" class="form-control" placeholder="Nome Científico" name="nomeCientifico" value="{{ $planta->nomeCientifico }}" required>
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
                @foreach($nomesPopulares as $nomePopular)
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <input type="text" minlength="3" maxlength="60" class="form-control" placeholder="Nome popular" name="nomesPopulares[{{ $loop->index }}]" value="{{ $nomePopular->nome }}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-outline-danger remove-tr">Remover</button>
                    </div>
                </div>
                @endforeach
            </div>
        </table>

        <div class="form-group">
            <button type="button" class="btn btn-outline-success add" id="add">Adicionar nome popular</button>
        </div>
        <!-- Caracteristicas -->
        <div class="form-group">
            <label>Tamanho</label>
            <input type="text" class="form-control" placeholder="Tamanho" name="tamanho" value="{{ $planta->tamanho }}" required>
            @error('tamanho')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Fruto</label>
            <textarea class="form-control ckeditor" placeholder="Descreva o Fruto da planta, caso haja" name="fruto">{{ old('fruto', $planta->fruto) }}</textarea>
        </div>
        <div class="form-group">
            <label>Folha</label>
            <textarea class="form-control ckeditor" placeholder="Descreva a Folha da planta" name="folha" required>{{ old('folha', $planta->folha) }}</textarea>
            @error('folha')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Caracteristícas</label><small style="color:green"> (flores, raízes, sementes, origem e entre outros)</small>
            <textarea class="form-control ckeditor" placeholder="Descreva a planta fisicamente e/ou fisiológicamente" name="caracteristicas">{{ old('caracteristicas', $planta->caracteristicas) }}</textarea>
        </div>
        <!-- Classificação -->
        <div class="form-row">
        <div class="form-group col-md-4">
                <label>Familia</label>
                <input type="text" minlength="3" maxlength="45" class="form-control @error('familia') is-invalid @enderror" placeholder="Familia da planta" name="familia" value="{{ $planta->familia }}" required>
                @error('familia')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label>Genero</label>
                <input type="text" minlength="3" maxlength="45" class="form-control @error('genero') is-invalid @enderror" placeholder="Genero da planta" name="genero" value="{{ $planta->genero }}" required>
                @error('genero')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label>Especie</label>
                <input type="text" minlength="3" maxlength="45" class="form-control @error('especie') is-invalid @enderror" placeholder="Especie da planta" name="especie" value="{{ $planta->especie }}">
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
            <textarea class="form-control ckeditor" placeholder="Descreva as propriedades medicinais da planta" name="propriedadesMedicinais" required>{{ old('propriedadesMedicinais', $planta->propriedadesMedicinais) }}</textarea>
            @error('propriedadesMedicinais')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Propriedades Gastronômicas</label>
            <textarea class="form-control ckeditor" placeholder="Descreva as propriedades gastronômicas da planta" name="propriedadesCulinarias" required>{{ old('propriedadesCulinarias', $planta->propriedadesCulinarias) }}</textarea>
            @error('propriedadesCulinarias')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!-- Cultivo -->
        <div class="form-group">
            <label>Cultivo</label>
            <textarea class="form-control ckeditor" placeholder="Descreva o processo de cultivo da planta" name="cultivo">{{ old('cultivo', $planta->cultivo) }}</textarea>
        </div>
        <!-- Avisos -->
        <div class="form-group">
            <label>Avisos</label>
            <textarea class="form-control ckeditor" placeholder="Escreve os avisos sobre a planta, caso haja" name="avisos">{{ old('avisos', $planta->avisos) }}</textarea>
        </div>
        <!-- Foto -->
        <div class="form-group">
            <label>Foto</label>
            <input type="text" class="form-control" placeholder="Url da foto" name="fotos" value="{{ $planta->fotos }}" required>
        </div>

        <div class="form-group">
            <label>Referência</label>
            <input type="text" class="form-control @error('fotos') is-invalid @enderror" placeholder="Url da foto" name="fotos" value="{{ $planta->fotos }}" required>
            @error('fotos')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Referências</label>
            <textarea class="form-control ckeditor" placeholder="Coloque aqui as referências dos sites, artigos e qualquer material pesquisado. De preferência nas normas ABNT" name="referencia" required>{{old('referencia', $planta->referencia)}}</textarea>
            @error('referencia')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        console.log('' + i + '');
        $("#dynamicTable").append('<div class="form-row"><div class="form-group col-md-10"><input type="text" class="form-control" placeholder="Nome popular" name="nomesPopulares[' + i + ']" required></div><div class="form-group col-md-2"><button type="button" class="btn btn-outline-danger remove-tr">Remover</button></div></div>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('div.form-row').remove();
    });

    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection