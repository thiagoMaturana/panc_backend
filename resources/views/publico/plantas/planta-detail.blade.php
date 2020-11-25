@extends('publico.layout')

@section('content')

<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="portfolio-details-container">
            <div class="portfolio-description">
                <h2>{{ $planta->nome }}</h2>
            </div>

            <div class="owl-carousel portfolio-details-carousel">
                <img src=" {{ $planta->fotos }}" class="img-fluid" alt="">
            </div>

        </div>

        <nav class="navbar navbar-expand-sm col-lg-12 d-flex justify-content-center ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link addDes" id="addDes" href="#"> Descrição</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link addPro" id="addPro" href="#">Propriedades e usos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link addCul" id="addCul" href="#">Cultivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link addRec" id="addRec" href="#">Receitas</a>
                </li>
            </ul>
        </nav>

        <div id="dynamicDiv">
            <p><b>Nomes populares:</b> @foreach($nomesPopulares as $nomePopular)<p> - {{ $nomePopular->nome }}</p>@endforeach</p>
            <p><b>Caracteristicas: </b> {!!$planta->caracteristicas!!}</p>
            <p><b>Tamanho: </b>{!!$planta->tamanho!!}</p>
            <p><b>Fruto: </b>{{ $planta->fruto }}</p>
            <p><b>Folha: </b>{{ $planta->folha }}</p>
            <p><b>Classificação: </b></p>
            <p><b>- Família: </b>{{ $planta->familia }}</p>
            <p><b>- Genêro: </b>{{ $planta->genero }}</p>
            <p><b>- Espécie: </b>{{ $planta->especie }}</p>
            <p><b>Avisos: </b> {{ $planta->avisos }}</p>
        </div>

    </div>
</section><!-- End Portfolio Details Section -->

<script type="text/javascript">
    $("#addDes").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Nomes populares:</b> @foreach($nomesPopulares as $nomePopular)<p> - {{ $nomePopular->nome }}</p>@endforeach</p><p><b>Caracteristicas: </b> {{ $planta->caracteristicas }}</p><p><b>Tamanho: </b>{{ $planta->tamanho }}</p><p><b>Fruto: </b>{{ $planta->fruto }}</p><p><b>Folha: </b>{{ $planta->folha }}</p><p><b>Classificação:</b></p><p><b>- Família: </b>{{ $planta->familia }}</p><p><b>- Genêro: </b>{{ $planta->genero }}</p><p><b>- Espécie: </b>{{ $planta->especie }}</p><p><b>Avisos: </b> {{ $planta->avisos }}</p>');
    })
    $("#addPro").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Propriedades Medicinais: </b> {{ $planta->propriedadesMedicinais }}</p><p><b>Propriedades Culinarias: </b> {{ $planta->propriedadesCulinarias }}</p>');
    })
    $("#addCul").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Cultivo: </b> {{ $planta->cultivo }}</p>');
    })
    $("#addRec").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p>Funcionalidade não funcional</p>');
    })
</script>

@endsection