@extends('publico.layout')

@section('content')

<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="portfolio-details-container">
            <div class="portfolio-description">
                <h2>{{ $receita->nome }}</h2>
            </div>

            <div class="owl-carousel portfolio-details-carousel">
                <img src=" {{ $receita->fotos }}" class="img-fluid" alt="">
            </div>

        </div>

        <nav class="navbar navbar-expand-sm col-lg-12 d-flex justify-content-center ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link addDes" id="addDes" href="#">Descrição</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link addIng" id="addIng" href="#">Ingredientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link addPre" id="addPre" href="#">Modo de preparo</a>
                </li>
            </ul>
        </nav>

        <div id="dynamicDiv">
            <p><b>Tipo: </b>{{ $receita->tipo }}</p>
            <p><b>Tempo de preparo: </b>{{ $receita->tempoPreparo }}</p>
            <p><b>Porções: </b>{{ $receita->porcoes }}</p>
            @if($receita->observacao)
            <p><b>Observação: </b>{!!$receita->observacao!!}</p>
            @endif
        </div>

        @if($tipoPg == 'minhasReceitas')
        <div class="row float-right">
            <form class="px-1" action="{{ route('publico.receita.edit', ['receita' => $receita->id]) }}" method="GET">
                <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
            </form>
            <form class="px-1" action="{{ route('publico.receita.destroy', ['receita' => $receita->id]) }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="user" value="">
                <input type="submit" class="btn btn-outline-danger" value="Remover">
            </form>
        </div>
        @endif
        <br><br>
        <p><i>Receita criada por <b>{{$usuario->name}}</b></i></p>
    </div>
</section><!-- End Portfolio Details Section -->

<script type="text/javascript">
    $("#addDes").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Tipo: </b>{{ $receita->tipo }}</p><p><b>Observação: </b>{!! $receita->observacao!!}</p>');
    })
    $("#addIng").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append(`
        <p><b>Plantas usadas:</b></p>
        @foreach ($nomePlantas as $nomePlanta)
        <p>{{$loop->index+1}}. {{$nomePlanta->nome}} - {{$quantidade}} </p>
        @endforeach 
        <p><b>Ingredientes:</b></p>
        @foreach($ingredientes as $ingrediente)
        <p>{{$loop->index+1}}. {{ $ingrediente->nome }} - {{$ingrediente->quantidade}}</p>
        @endforeach`);
    })
    $("#addPre").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Modo de preparo: </b>{!!$receita->modoPreparo!!}</p>');
    })
</script>

@endsection