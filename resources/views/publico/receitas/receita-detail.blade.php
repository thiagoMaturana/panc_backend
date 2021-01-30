@extends('publico.layout')

@section('content')

<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <h2 class="display-5 text-center">{{ $receita->nome }}</h2> <br>

        <div class="owl-carousel portfolio-details-carousel">
            <img src=" {{ $receita->fotos }}" class="img-fluid" alt="">
        </div>

        <br>

        <div class="row">
            <div class="col-lg-12 info">
                <div class="recipe-data clearfix recipe-info-box row">
                    <div class="serve block col">
                        <div class="ico-svg ico-orange svg-small">
                            <i style="font-size: 1.5em;" class='bx bx-food-menu'></i>
                        </div>
                        <span class="num preptime">
                            <time class="dt-duration">
                                {{ $receita->tipo }}
                            </time>
                        </span>
                    </div>
                    <div class="clock block col">
                        <div class="ico-svg ico-orange svg-small">
                            <i style="font-size: 1.5em;" class='bx bx-time-five'></i>
                        </div>
                        <span class="label">
                            Preparo
                        </span>
                        <span class="num preptime">
                            <time class="dt-duration">
                                {{ $receita->tempoPreparo }}
                            </time>
                        </span>
                    </div>
                    <div class="serve block col">
                        <div class="ico-svg ico-orange svg-small">
                            <i style="font-size: 1.5em;" class='bx bx-dish'></i>
                        </div>
                        <span class="label">
                            Rendimento
                        </span>
                        <data class="p-yield num yield">
                            {{ $receita->porcoes }}
                        </data>
                    </div>
                    <div class="serve block col">
                        <div class="ico-svg ico-orange svg-small">
                            <i style="font-size: 1.5em;" class='bx bx-user'></i>
                        </div>
                        <span class="label">
                            {{$usuario->name}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dynamicDiv" class="px-3">

        <div class="section-title">
            <h2>Ingredientes</h2>

            <p class="title"><b>Plantas usadas:</b></p>

            @foreach ($plantas as $planta) 
            <p class="text" style="margin: 5px;">{{$loop->index+1}}. <a style="color: darkgreen;" href="{{ route('planta.show', ['planta' => $planta->id]) }}">{{$planta->nome}}</a> - {{$quantidade}} </p>
            @endforeach

            <p class="title"><b>Ingredientes:</b></p>

            @foreach($ingredientes as $ingrediente)
            <p class="text" style="margin: 5px;">{{$loop->index+1}}. {{ $ingrediente->nome }} - {{$ingrediente->quantidade}}</p>
            @endforeach
        </div>

        <div class="section-title">
            <h2>Modo de Preparo</h2>
            <p class="text">{!!$receita->modoPreparo!!}</p>
        </div>
    </div>

    @if(Auth::user() && $tipoPg == 'verReceitaDoUsuario')
    <div class="row float-right px-4">
        <form class="px-1" action="{{ route('receita.edit', ['receita' => $receita->id]) }}" method="GET">
            <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
        </form>
        <form class="px-1" action="{{ route('receita.destroy', ['receita' => $receita->id]) }}" method="POST">
            @csrf
            @method('delete')
            <input type="hidden" name="user" value="">
            <input type="submit" class="btn btn-outline-danger" value="Remover">
        </form>
    </div>
    @endif
</section>

@endsection