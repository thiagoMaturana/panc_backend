@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">

        <form action="{{ route('publico.planta.store') }}" method="POST">
            @csrf

            @if(isset($errors) && count($errors)>0)
            <div class="text-center alert-danger">
                @foreach($errors->all() as $erro)
                {{ $erro }} <br>
                @endforeach
            </div>
            @endif

            <!-- Nomes -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Nome Científico</label>
                    <input type="text" class="form-control" placeholder="Nome Científico" name="nomeCientifico" required>
                </div>
            </div>

            <label>Nomes populares</label>
            <table>
                <div id="dynamicTable">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" placeholder="Nome popular" name="nomesPopulares[0]" required>
                        </div>
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
                <input type="text" class="form-control" placeholder="Tamanho" name="tamanho" required>
            </div>
            <div class="form-group">
                <label>Fruto</label>
                <textarea class="form-control" placeholder="Descreva o Fruto da planta, caso haja" rows="3" name="fruto"></textarea>
            </div>
            <div class="form-group">
                <label>Folha</label>
                <textarea class="form-control" placeholder="Descreva a Folha da planta" rows="3" name="folha" required></textarea>
            </div>
            <div class="form-group">
                <label>Caracteristícas</label>
                <textarea class="form-control" placeholder="Descreva a planta fisicamente e/ou fisiológicamente" rows="3" name="caracteristicas"></textarea>
            </div>
            <!-- Classificação -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Familia</label>
                    <input type="text" class="form-control" placeholder="Familia da planta" name="familia" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Genero</label>
                    <input type="text" class="form-control" placeholder="Genero da planta" name="genero" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Especie</label>
                    <input type="text" class="form-control" placeholder="Especie da planta" name="especie" required>
                </div>
            </div>
            <!-- Propriedades -->
            <div class="form-group">
                <label>Propriedades Medicinais</label>
                <textarea class="form-control" placeholder="Descreva as propriedades medicinais da planta" rows="3" name="propriedadesMedicinais" required></textarea>
            </div>
            <div class="form-group">
                <label>Propriedades Gastronômicas</label>
                <textarea class="form-control" placeholder="Descreva as propriedades gastronômicas da planta" rows="3" name="propriedadesCulinarias" required></textarea>
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
                <input type="text" class="form-control" placeholder="Url da foto" name="fotos" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    </div>
</section><!-- End Portfolio Section -->


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
</script>
@endsection