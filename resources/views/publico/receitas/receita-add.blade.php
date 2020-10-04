@extends('publico.layout')

@section('content')
<div class="container p-5">
    <form action="{{ route('publico.receita.store') }}" method="POST">
        @csrf

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
                <input type="text" class="form-control" name="nome" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-4">
                <label class="small mb-1 ">Tipo</label>
                <select name="tipo" class="form-control" required>
                    <option name="tipo" value="Doces e Bolos"> Doces e Bolos </option>
                    <option name="tipo" value="Carnes"> Carnes </option>
                    <option name="tipo" value="Frutos do Mar"> Frutos do Mar </option>
                    <option name="tipo" value="Saladas, Molhos e Acompanhamentos"> Saladas, Molhos e Acompanhamentos </option>
                    <option name="tipo" value="Sopas"> Sopas </option>
                    <option name="tipo" value="Massas"> Massas </option>
                    <option name="tipo" value="Bebidas"> Bebidas </option>
                </select>
            </div>
        </div>

        <label class="small mb-1">Ingredientes</label>
        <table>
            <div id="dynamicTable">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Quantidade" name="quantidade[0]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Ingrediente" name="ingredientes[0]" required>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-outline-danger remove-tr">Remover</button>
                    </div>
                </div>
            </div>
        </table>
        <div class="form-group">
            <button type="button" class="btn btn-outline-success add" id="add">Adicionar ingrediente</button>
        </div>

        <div class="form-group">
            <label class="small mb-1">Modo de preparo</label>
            <textarea class="form-control" name="modoPreparo" placeholder="Modo de preparo" required rows="3"></textarea>
        </div>
        <div class="form-group">
            <label class="small mb-1">Observação</label>
            <textarea class="form-control" name="observacao" placeholder="Observação" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label class="small mb-1 ">Foto</label>
            <input type="text" class="form-control" name="fotos" placeholder="Foto" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        console.log('' + i + '');

        $("#dynamicTable").append('<div class="form-row"><div class="form-group col-md-4"><input type="text" class="form-control" placeholder="Quantidade" name="quantidade[' + i + ']"></div><div class="form-group col-md-6"><input type="text" class="form-control" placeholder="Ingrediente" name="ingredientes[' + i + ']"></div><div class="form-group col-md-2"><button type="button" class="btn btn-outline-danger remove-tr">Remover</button></div></div>');

    });

    $(document).on('click', '.remove-tr', function() {

        $(this).parents('div.form-row').remove();

    });
</script>

@endsection