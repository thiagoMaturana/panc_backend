@extends('publico.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('publico.receita.update', ['receita' => $receita->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-8">
                <label class="small mb-1 ">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ $receita->nome }}" minlength="3" required>
                @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label class="small mb-1 ">Tipo</label>
                <select name="tipo" class="form-control" required>
                    @if($receita->tipo == 'Doces e Bolos')
                    <option name="tipo" value="Doces e Bolos" selected> Doces e Bolos </option>
                    @else
                    <option name="tipo" value="Doces e Bolos"> Doces e Bolos </option>
                    @endif

                    @if($receita->tipo == 'Carnes')
                    <option name="tipo" value="Carnes" selected> Carnes </option>
                    @else
                    <option name="tipo" value="Carnes"> Carnes </option>
                    @endif

                    @if($receita->tipo == 'Frutos do Mar')
                    <option name="tipo" value="Frutos do Mar" selected> Frutos do Mar </option>
                    @else
                    <option name="tipo" value="Frutos do Mar"> Frutos do Mar </option>
                    @endif

                    @if($receita->tipo == 'Saladas, Molhos e Acompanhamentos')
                    <option name="tipo" value="Saladas, Molhos e Acompanhamentos" selected> Saladas, Molhos e Acompanhamentos </option>
                    @else
                    <option name="tipo" value="Saladas, Molhos e Acompanhamentos"> Saladas, Molhos e Acompanhamentos </option>
                    @endif

                    @if($receita->tipo == 'Sopas')
                    <option name="tipo" value="Sopas" selected> Sopas </option>
                    @else
                    <option name="tipo" value="Sopas"> Sopas </option>
                    @endif

                    @if($receita->tipo == 'Massas')
                    <option name="tipo" value="Massas" selected> Massas </option>
                    @else
                    <option name="tipo" value="Massas"> Massas </option>
                    @endif

                    @if($receita->tipo == 'Bebidas')
                    <option name="tipo" value="Bebidas" selected> Bebidas </option>
                    @else
                    <option name="tipo" value="Bebidas"> Bebidas </option>
                    @endif

                </select>
            </div>
        </div>

        <label class="small mb-1">Ingredientes</label>
        <table>
            <div id="dynamicTable">
                @foreach($ingredientes as $ingrediente)
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Quantidade. Ex.: 1 xícara,= ou 350ml" name="quantidade[ {{ $loop->index }} ]" value="{{ $ingrediente->quantidade }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" maxlength="60" class="form-control" placeholder="Ingrediente" name="ingredientes[ {{ $loop->index }} ]" value="{{ $ingrediente->nome }}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-outline-danger remove-tr">Remover</button>
                    </div>
                </div>
                @endforeach
            </div>
        </table>

        <div class="form-group">
            <button type="button" class="btn btn-outline-success add" id="add">Adicionar ingrediente</button>
        </div>

        <label class="small mb-1">Plantas</label>
        <table>
            <div id="tablePlantas">
                @foreach($receita->plantas as $planta)
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control @error('quantidadePlanta.*') is-invalid @enderror" id="quantidadePlanta" placeholder="Quantidade. Ex.: 1 xícara ou 350ml" name="quantidadePlanta[{{$loop->index}}]" value="{{ $planta->pivot->quantidade }}" required>
                        @error('quantidadePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }} 
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" minlength="3" maxlength="60" name="nomePlanta[{{$loop->index}}]" class="form-control nomePlanta @error('nomePlanta.*') is-invalid @enderror" onkeyup="fetchPlanta(this)" placeholder="Entre com o nome da Planta" list="plantaList" value="{{ $planta->nome }}" required>
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
                @endforeach
                <datalist id="plantaList"></datalist>
            </div>
        </table>

        <div class="form-group">
            <button type="button" class="btn btn-outline-success addPlanta" id="addPlanta">Adicionar planta</button>
        </div>

        <div class="form-group">
            <label class="small mb-1">Modo de preparo</label>
            <textarea class="form-control @error('modoPreparo') is-invalid @enderror" name="modoPreparo" placeholder="Modo de preparo" required rows="3">{{ old('modoPreparo', $receita->modoPreparo) }}</textarea>
            @error('modoPreparo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1">Observação</label>
            <textarea class="form-control " name="observacao" placeholder="Observação" rows="3">{{ old('observacao', $receita->observacao) }}</textarea>
        </div>
        <div class="form-group">
            <label class="small mb-1 ">Foto</label>
            <input type="text" class="form-control @error('fotos') is-invalid @enderror" name="fotos" value="{{ $receita->fotos }}" placeholder="Foto" required>
            @error('fotos')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

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
                        <input type="text" minlength="3" class="form-control @error('quantidadePlanta.*') is-invalid @enderror" id="quantidadePlanta" placeholder="Quantidade. Ex.: 1 xícara ou 350ml" name="quantidadePlanta[]">
                        @error('quantidadePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }} 
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" minlength="3" maxlength="60" name="nomePlanta[]" class="form-control nomePlanta @error('nomePlanta.*') is-invalid @enderror" placeholder="Entre com o nome da Planta" onkeyup="fetchPlanta(this)" list="plantaList""/>
                        @error('nomePlanta.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-outline-danger remove-tr-planta">Remover</button>
                    </div>
                    <datalist id="plantaList"></datalist>
                </div>`;
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
x
    });
</script>
@endsection