@extends('publico.layout')

@section('content')

<section id="portfolio-details" style="padding-top: 0;" class="portfolio-details">
    <div class="container">
        <div class="portfolio-description">
            <h2>{{ $planta->nome }}</h2>
            @if ($planta->status == "cadastrada")
            <p style="color:red">Salva como rascunho, clique em "Submeter para análise" para enviar a planta para análise, podendo ser aprovada ou rejeitada</p>
            @endif
        </div>

        <div class="owl-carousel portfolio-details-carousel">
            <img src=" {{ $planta->fotos }}" class="img-fluid" alt="">
        </div>

        <div id="dynamicDiv" style="margin-top: 15px;">
            <div class="section-title">
                <h2>Descrição</h2>
                <div class="nomesPopulares">
                    <p class="title" style="margin: 4px;"><b>Nomes populares</b></p>
                    @foreach($nomesPopulares as $nomePopular)
                    <p style="margin: 2px;"> - {{ $nomePopular->nome }};</p>
                    @endforeach
                </div>
                <div style="margin-top: 15px;">
                    <p class="title"><b>Classificação</b></p>
                    <p style="margin: 2px;">Família: <em>{{ $planta->familia }}</em></p>
                    <p style="margin: 2px;">Genêro: <em>{{ $planta->genero }}</em></p>
                    <p style="margin: 2px;">Espécie: <em>{{ $planta->especie }}</em></p>
                </div>
                <div style="margin-top: 15px;">
                    <p class="title"><b>Caracteristicas</b></p>
                    <p style="color: yellow;">{!!$planta->caracteristicas!!}</p>
                </div>
                @if($planta->fruto)
                <div>
                    <p class="title"><b>Fruto</b></p>
                    <p>{!!$planta->fruto!!}</p>
                </div>
                @endif
                <div>
                    <p class="title"><b>Folha</b></p>
                    <p>{!!$planta->folha!!}</p>
                </div>
                <div>
                    <p class="title"><b>Tamanho</b></p>
                    <p>{!!$planta->tamanho!!}</>
                </div>
            </div>
            <div class="section-title">
                <h2>Propriedades Medicinais</h2>
                <p class="text">{!!$planta->propriedadesMedicinais!!}</p>
            </div>
            <div class="section-title">
                <h2>Propriedades Culinarias</h2>
                <p class="text">{!!$planta->propriedadesCulinarias!!}</p>
            </div>

            <div class="section-title">
                <h2 id="cultivo">Cultivo</h2>
                <p>{!!$planta->cultivo!!}</p>
            </div>

            @if ($planta->avisos)
            <div class="section-title">
                <h2>Avisos</h2>
                <p>{!!$planta->avisos!!}</p=>
            </div>
            @endif

            <div class="section-title">
                <h2>Referências</h2>
                <p>{!!$planta->referencia!!}</plass=>
            </div>

            @if(empty($receitas))
            <div class="section-title">
                <h2>Receitas</h2>
                @foreach($receitas as $receita)
                <a href="{{ route('receita.show', ['receita' => $receita->id]) }}" style="margin: 2px"> - {{ $receita->nome }}</a>
                @endforeach
            </div>
            @endif

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

    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection