@extends('publico.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('receita.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-8">
                <label class="small mb-1 ">Nome</label><small style="color:red"> *</small>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome') }}" minlength="3" required>
                @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label class="small mb-1 ">Tipo</label><small style="color:red"> *</small>
                <select name="tipo" class="form-control" required>
                    <option name="tipo" value="Doces e Bolos"> Doces e Bolos </option>
                    <option name="tipo" value="Carnes"> Carnes </option>
                    <option name="tipo" value="Saladas, Molhos e Acompanhamentos"> Saladas, Molhos e Acompanhamentos </option>
                    <option name="tipo" value="Prato principal"> Saladas, Molhos e Acompanhamentos </option>
                    <option name="tipo" value="Sopas"> Sopas </option>
                    <option name="tipo" value="Massas"> Massas </option>
                    <option name="tipo" value="Bebidas"> Bebidas </option>
                </select>
            </div>
        </div>

        @if ($erroEx)
        <div class="alert alert-danger" role="alert">
            {{ $erroEx }}
        </div>
        @endif

        <label class="small mb-1">Ingredientes</label><small style="color:red"> *</small>
        <table>
            <div id="dynamicTable">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control @error('quantidade.*') is-invalid @enderror" placeholder="Quantidade. Ex.: 1 xícara, ou 350ml" name="quantidade[]" required>
                        @error('quantidade.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" minlength="3" maxlength="60" class="form-control @error('ingredientes.*') is-invalid @enderror" placeholder="Ingrediente" name="ingredientes[]" required>
                        @error('ingredientes.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" style="padding-right: 40px; padding-left: 40px;" class="btn btn-outline-danger remove-tr">Remover</button>
                    </div>
                </div>
            </div>
        </table>

        <div class="form-group">
            <button type="button" class="btn btn-outline-success add" id="add">Adicionar ingrediente</button>
        </div>

        <label class="small mb-1">Plantas</label><small style="color:red"> *</small>
        <table>
            <div id="tablePlantas">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control @error('quantidadePlanta.*') is-invalid @enderror" id="quantidadePlanta" placeholder="Quantidade. Ex.: 1 xícara, ou 350ml" name="quantidadePlanta[]" required>
                        @error('quantidadePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" minlength="3" maxlength="60" name="nomePlanta[]" class="form-control nomePlanta @error('nomePlanta.*') is-invalid @enderror" onkeyup="fetchPlanta(this)" placeholder="Entre com o nome da Planta" list="plantaList" required>
                        @error('nomePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" style="padding-right: 40px; padding-left: 40px;" class="btn btn-outline-danger remove-tr-planta">Remover</button>
                    </div>
                </div>
                <datalist id="plantaList"></datalist>
            </div>
        </table>

        <div class="form-group">
            <button type="button" class="btn btn-outline-success addPlanta" id="addPlanta">Adicionar planta</button>
        </div>

        <div class="form-group">
            <label class="small mb-1">Porções</label><small style="color:red"> *</small>
            <input type="text" maxlength="100" class="form-control @error('porcoes') is-invalid @enderror" name="porcoes" placeholder="Porções" required>
            @error('porcoes')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="small mb-1">Tempo de preparo</label><small style="color:red"> *</small>
            <input type="text" maxlength="60" class="form-control @error('tempoPreparo') is-invalid @enderror" name="tempoPreparo" placeholder="Tempo de preparo. Ex: 40m, 1h e 30m" required>
            @error('tempoPreparo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="small mb-1">Modo de preparo</label><small style="color:red"> *</small>
            <textarea class="form-control ckeditor" name="modoPreparo" placeholder="Modo de preparo" required>{{ old('modoPreparo') }}</textarea>
            @error('modoPreparo')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1">Observação</label>
            <textarea class="form-control ckeditor" name="observacao" placeholder="Observação" rows="3">{{ old('observacao') }}</textarea>
        </div>
        <div class="form-group">
            <label class="small mb-1 ">Foto</label><small style="color:red"> *</small>
            <input type="text" class="form-control @error('fotos') is-invalid @enderror" name="fotos" placeholder="Foto" value="{{ old('fotos') }}" required>
            @error('fotos')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    var i = 0;
    var a = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<div class="form-row"><div class="form-group col-md-4"><input type="text" class="form-control @error("quantidade.*") is-invalid @enderror" minlength="3" placeholder="Quantidade. Ex.: 1 xícara ou 350ml" name="quantidade[' + i + ']">@error("quantidade.*")<div class="invalid-feedback">{{ $message }}</div>@enderror</div><div class="form-group col-md-6"><input type="text" minlength="3" maxlength="60" class="form-control @error("ingredientes.*") is-invalid @enderror" placeholder="Ingrediente" name="ingredientes[' + i + ']">@error("ingredientes.*")<div class="invalid-feedback">{{ $message }}</div>@enderror</div><div class="form-group col-md-2"><button type="button" class="btn btn-outline-danger remove-tr">Remover</button></div></div>');

    });

    $(document).on('click', '.remove-tr', function() {

        $(this).parents('div.form-row').remove();

    });

    $("#addPlanta").click(function() {
        ++a;
        let divInputPlanta =
            `<div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control @error('quantidadePlanta.*') is-invalid @enderror" id="quantidadePlanta" placeholder="Quantidade. Ex.: 1 xícara, ou 350ml" name="quantidadePlanta[]" required>
                    @error('quantidadePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <input type="text" minlength="3" maxlength="60" name="nomePlanta[]" class="form-control nomePlanta @error('nomePlanta.*') is-invalid @enderror" onkeyup="fetchPlanta(this)" placeholder="Entre com o nome da Planta" list="plantaList" required>
                    @error('nomePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-outline-danger remove-tr-planta">Remover</button>
                </div>
            </div>
            <datalist id="plantaList"></datalist>`;
        $("#tablePlantas").append(divInputPlanta);

    });

    $(document).on('click', '.remove-tr-planta', function() {
        $(this).parents('div.form-row').remove();
    });

    function fetchPlanta(element) {
        var minlength = 2;
        var query = element.value;
        if (query.length >= minlength) {
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('receita.fetchPlanta') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        console.log(data);

                        for (planta of data) {
                            //cria option para o datalist
                            let option = document.createElement("OPTION");
                            option.value = planta['nome'];
                            //cria seletor para verificar se aquela opção já existe
                            let seletorOption = `#plantaList option[value='${planta['nome']}']`;
                            //se não existe aquela opção adiciona
                            if ($(seletorOption).length == 0) {
                                $('#plantaList').append(option);
                            }
                        }
                    }
                });
            }
        }
    }

    $(document).ready(function() {

        $(document).on('click', 'li', function() {
            $('.nomePlanta').val($(this).text());
        });

    });

    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection