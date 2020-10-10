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
            <p><b>Observação: </b>{{ $receita->observacao }}</p>
        </div>

    </div>
</section><!-- End Portfolio Details Section -->

<script type="text/javascript">
    $("#addDes").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Tipo: </b>{{ $receita->tipo }}</p><p><b>Observação: </b>{{ $receita->observacao }}</p>');
    })
    $("#addIng").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('@foreach($ingredientes as $ingrediente)<p> {{$ingrediente->quantidade}} {{ $ingrediente->nome }}</p>@endforeach');
    })
    $("#addPre").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Modo de preparo: </b>{{ $receita->modoPreparo }}</p>');
    })
</script>

@endsection