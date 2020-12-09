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
                    <a class="nav-link addRec" href="{{ route('receita.porPlanta', ['planta' => $planta->id]) }}">Receitas</a>
                </li>
            </ul>
        </nav>

        <div id="dynamicDiv">
            <p><b>Nomes populares:</b> @foreach($nomesPopulares as $nomePopular)<p> - {{ $nomePopular->nome }}</p>@endforeach</p>
            <p><b>Caracteristicas: </b> {!!$planta->caracteristicas!!}</p>
            <p><b>Tamanho: </b>{!!$planta->tamanho!!}</p>
            <p><b>Fruto: </b>{!!$planta->fruto!!}</p>
            <p><b>Folha: </b>{!!$planta->folha!!}</p>
            <p><b>Classificação: </b></p>
            <p><b>- Família: </b>{{ $planta->familia }}</p>
            <p><b>- Genêro: </b>{{ $planta->genero }}</p>
            <p><b>- Espécie: </b>{{ $planta->especie }}</p>
            <p><b>Avisos: </b> {!!$planta->avisos!!}</p>
            <p><b>Referências: </b> {!!$planta->referencia!!}</p><br><br><br>

            @if($tipo == 'verPlantaCadastradaDoUsuario' && $planta->status == 'rejeitada')
            <p><b>Justificativa da rejeição: </b>{!!$planta->parecer!!}</p>
            @endif
        </div>


        @if($tipo == 'verPlantaParaAnalise')
        <form class="px-1" action="{{ route('planta.parecer', ['planta' => $planta->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Justificativa</label>
                <textarea class="form-control ckeditor" name="parecer" required>{{$planta->parecer ?? old('parecer')}}</textarea>
                @error('parecer')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="submit" class="btn btn-outline-danger" value="Rejeitar">
        </form>
        @endif

        <div class="row float-right">
            @if(($tipo == 'verPlantaCadastradaDoUsuario' && ($planta->status == 'cadastrada' || $planta->status == 'rejeitada'))|| $tipo == 'verPlantaParaAnalise')

            <form class="px-1" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
            </form>

            @if($tipo == 'verPlantaCadastradaDoUsuario' && ($planta->status == 'cadastrada' || $planta->status == 'rejeitada'))
            <form class="px-1" action="{{ route('planta.destroy', ['planta' => $planta->id]) }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="user" value="">
                <input type="submit" class="btn btn-outline-danger" value="Remover">
            </form>
            <form class="px-1" action="{{ route('planta.submeter', ['planta' => $planta->id]) }}" method="GET">
                <input type="submit" class="btn btn-outline-secondary" value="Submeter para análise"></input>
            </form>
            @endif

            @endif

            @if($tipo == 'verPlantaParaAnalise')
            <form class="px-1" action="{{ route('planta.aprovar', ['planta' => $planta->id]) }}" method="GET">
                <input type="submit" class="btn btn-outline-success" value="Aprovar"></input>
            </form>
            @endif
        </div>
    </div>
</section><!-- End Portfolio Details Section -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $("#addDes").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Nomes populares:</b> @foreach($nomesPopulares as $nomePopular)<p> - {{ $nomePopular->nome }}</p>@endforeach</p><p><b>Caracteristicas: </b> {!!$planta->caracteristicas!!}</p><p><b>Tamanho: </b>{{ $planta->tamanho }}</p><p><b>Fruto: </b>{!!$planta->fruto!!}</p><p><b>Folha: </b>{!!$planta->folha!!}</p><p><b>Classificação:</b></p><p><b>- Família: </b>{{ $planta->familia }}</p><p><b>- Genêro: </b>{{ $planta->genero }}</p><p><b>- Espécie: </b>{{ $planta->especie }}</p><p><b>Avisos: </b> {!!$planta->avisos!!}</p>');
    })
    $("#addPro").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Propriedades Medicinais: </b> {!!$planta->propriedadesMedicinais!!}</p><p><b>Propriedades Culinarias: </b> {!!$planta->propriedadesCulinarias!!}</p>');
    })
    $("#addCul").click(function() {
        document.getElementById("dynamicDiv").innerHTML = "";
        $("#dynamicDiv").append('<p><b>Cultivo: </b> {!!$planta->cultivo!!}</p>');
    })

    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection