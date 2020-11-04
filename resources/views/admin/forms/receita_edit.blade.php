@extends('admin.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('receita.update', ['receita' => $receita->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @if(isset($errors) && count($errors)>0)
        <div class="text-center alert-danger">
            @foreach($errors->all() as $erro)
            {{ $erro }} <br>
            @endforeach
        </div>
        @endif

        <div class="form-row">
            <div class="form-group col-md-8">
                <label class="small mb-1 ">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $receita->nome }}" required>
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
                        <input type="text" class="form-control" placeholder="Quantidade" name="quantidade[ {{ $loop->index }} ]" value="{{ $ingrediente->quantidade }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Ingrediente" name="ingredientes[ {{ $loop->index }} ]" value="{{ $ingrediente->nome }}" required>
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

        <div class="form-group">
            <label class="small mb-1">Modo de preparo</label>
            <textarea class="form-control" name="modoPreparo" placeholder="Modo de preparo" required rows="3">{{ old('modoPreparo', $receita->modoPreparo) }}</textarea>
        </div>
        <div class="form-group">
            <label class="small mb-1">Observação</label>
            <textarea class="form-control" name="observacao" placeholder="Observação" rows="3">{{ old('observacao', $receita->observacao) }}</textarea>
        </div>
        <div class="form-group">
            <label class="small mb-1 ">Foto</label>
            <input type="text" class="form-control" name="fotos" value="{{ $receita->fotos }}" placeholder="Foto" required>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<div class="form-row"><div class="form-group col-md-4"><input type="text" class="form-control" placeholder="Quantidade" name="quantidade[' + i + ']" required></div><div class="form-group col-md-6"><input type="text" class="form-control" placeholder="Ingrediente" name="ingredientes[' + i + ']" required></div><div class="form-group col-md-2"><button type="button" class="btn btn-outline-danger remove-tr">Remover</button></div></div>');

    });

    $(document).on('click', '.remove-tr', function() {

        $(this).parents('div.form-row').remove();

    });
</script>
@endsection