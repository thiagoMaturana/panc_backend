@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">

        <form action="{{ route('planta.store') }}" method="POST">
            @csrf

            <!-- Nomes -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome popular principal</label><small style="color:red"> *</small>
                    <input type="text" minlength="3" maxlength="60" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome principal" name="nome" value="{{old('nome')}}" required>
                    @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Nome Científico</label><small style="color:red"> *</small>
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

            <label>Outros nomes populares</label><small style="color:red"> *</small>
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
                <label>Tamanho</label><small style="color:red"> *</small>
                <input type="text" class="form-control @error('tamanho') is-invalid @enderror" placeholder="Tamanho. Ex: 1m ou 30cm" name="tamanho" value="{{old('tamanho')}}" required>
                @error('tamanho')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Fruto</label><small style="color:green"> (tempo de maturação, coloração, formato, classificação como seco ou carnoso, baga ou drupa e entre outras)</small>
                <textarea class="form-control ckeditor" placeholder="Descreva o Fruto da planta, caso haja" name="fruto">{{old('fruto')}}</textarea>
            </div>
            <div class="form-group">
                <label>Folha</label><small style="color:red"> *</small><small style="color:green"> (classificação pelo limbo e o seu formato, posição do pecíolo, nervuras, superfície e folíolos)</small>
                <textarea class="form-control ckeditor" placeholder="Descreva a Folha da planta" name="folha" required>{{old('folha')}}</textarea>
                @error('folha')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Caracteristícas</label><small style="color:red"> *</small><small style="color:green"> (flores, raízes, sementes, origem e entre outros)</small>
                <textarea class="form-control ckeditor" placeholder="Descreva a planta fisicamente e/ou fisiológicamente" name="caracteristicas">{{old('caracteristicas')}}</textarea>
            </div>
            <!-- Classificação -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Familia</label><small style="color:red"> *</small>
                    <input type="text" minlength="3" maxlength="45" class="form-control @error('familia') is-invalid @enderror" placeholder="Familia da planta" value="{{old('familia')}}" name="familia" required>
                    @error('familia')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label>Genero</label><small style="color:red"> *</small>
                    <input type="text" minlength="3" maxlength="45" class="form-control @error('genero') is-invalid @enderror" value="{{old('genero')}}" placeholder="Genero da planta" name="genero" required>
                    @error('genero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label>Especie</label><small style="color:red"> *</small>
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
                <label>Propriedades Medicinais</label><small style="color:red"> *</small>
                <textarea class="form-control ckeditor" placeholder="Descreva as propriedades medicinais da planta" name="propriedadesMedicinais" required>{{old('propriedadesMedicinais') ?? 'Sem propriedades medicinais conhecidas'}}</textarea>
                @error('propriedadesMedicinais')
                <div class="alert alert-danger">
                    {{$message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Propriedades Gastronômicas</label><small style="color:red"> *</small>
                <textarea class="form-control ckeditor" placeholder="Descreva as propriedades gastronômicas da planta" name="propriedadesCulinarias" required>{{old('propriedadesCulinarias')?? 'Sem propriedades gastronômicas conhecidas'}}</textarea>
                @error('propriedadesCulinarias')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Cultivo -->
            <div class="form-group">
                <label>Cultivo</label>
                <textarea class="form-control ckeditor" placeholder="Descreva o processo de cultivo da planta" name="cultivo">{{old('cultivo')}}</textarea>
            </div>
            <!-- Avisos -->
            <div class="form-group">
                <label>Avisos</label>
                <textarea class="form-control ckeditor" placeholder="Escreve os avisos sobre a planta, caso haja" name="avisos">{{old('avisos')}}</textarea>
            </div>
            <!-- Foto -->
            <div class="form-group">
                <label>Foto</label><small style="color:red"> *</small>
                <input type="text" class="form-control @error('fotos') is-invalid @enderror" placeholder="Url ou link da foto" name="fotos" value="{{old('fotos')}}" required>
                @error('fotos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Referências</label><small style="color:red"> *</small>
                <textarea class="form-control ckeditor" placeholder="Coloque aqui as referências dos sites, artigos e qualquer material pesquisado. De preferência nas normas ABNT" name="referencia" required>{{old('referencia')}}</textarea>
                @error('referencia')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar como rascunho</button>
        </form>

    </div>
</section><!-- End Portfolio Section -->


<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<div class="form-row"><div class="form-group col-md-10"><input type="text" class="form-control @error("nomesPopulares.*") is-invalid @enderror" minlength="3" maxlength="60" placeholder="Nome popular" name="nomesPopulares[' + i + ']" required></div>@error("nomesPopulares.*")<div class="invalid-feedback">{{ $message }}</div>@enderror<div class="form-group col-md-2"><button type="button" class="btn btn-outline-danger remove-tr">Remover</button></div></div>');

    });

    $(document).on('click', '.remove-tr', function() {

        $(this).parents('div.form-row').remove();

    });

    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection