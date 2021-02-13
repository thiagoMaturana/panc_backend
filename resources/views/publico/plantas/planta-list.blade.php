@extends('publico.layout')

@section('content')

<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <nav class="mt-0 pt-o navbar-expand-lg navbar-light section-bg sticky-top justify-content-center">
      @if($tipo == 'todasAsPlantas')
      <form class="text-center" action="{{ route('planta.search') }}" method="GET">
        <div class="form-row">
          <div class="form-group col-md-11">
            <input type="search" class="form-control" name="search" placeholder="Procure pelos nomes populares ou científicos..." value="{{request()->search}}">
          </div>
          <div class="form-group col-md-1">
            <button type="submit" class="btn btn-outline-primary form-control"><i class='bx bx-search-alt bx-sm'></i></button>
          </div>
        </div>
      </form>
      @endif
    </nav>

    @if($tipo == 'minhasPlantas')
    <nav class="navbar navbar-expand-sm col-lg-12 d-flex justify-content-center ">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link addDes" id="todas" href="#">Todas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link addDes" id="cadastradas" href="#">Rascunhos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link addIng" id="submetidas" href="#">Em análise</a>
        </li>
        <li class="nav-item">
          <a class="nav-link addPre" id="aprovadas" href="#">Aprovadas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link addPre" id="rejeitadas" href="#">Rejeitadas</a>
        </li>
      </ul>
    </nav>
    @endif

    @if($error)
    <div class="alert alert-primary text-center" role="alert">
      {{$error}}
    </div>
    @endif

    <div class="portfolio-container" id="dynamicDiv" data-aos="fade-up" data-aos-delay="100">

      @foreach ($plantas as $planta)

      <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
        <div class="portfolio-wrap">
          @if(Auth:: user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && $tipo == 'paraAnalise')
          <a href="{{ route('planta.showParaAnalise', ['planta' => $planta->id]) }}">
            @else
            <a href="{{ route('planta.show', ['planta' => $planta->id]) }}">
              @endif
              <div class="card d-flex align-items-center">
                <img class="card-img-top p-3" src="{{ $planta->fotos }}">
                <div class="card-body">
                  @if($tipo == 'minhasPlantas')
                  <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }}
                    @if($planta->status == 'cadastrada')<span class="badge badge-primary">Cadastrada
                      @endif
                      @if($planta->status == 'submetida')<span class="badge badge-dark">Em análise
                        @endif
                        @if($planta->status == 'aprovada')<span class="badge badge-success">Aprovada
                          @endif
                          @if($planta->status == 'rejeitada')<span class="badge badge-danger">Rejeitada
                            @endif
                          </span></h3>
                  @else
                  <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} </h3>
                  @endif
                  <p class="card-title text-center" style="color:gray">
                    <i>{{ $planta->nomeCientifico }}</i>
                  </p>
                  <p style="color:black" class="card-text text-justify">
                    {!!$planta->caracteristicas!!}
                  </p>

                  @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && !($tipo == 'paraAnalise'))
                  <form class="py-1 text-center" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                    <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                  </form>
                  @endif
                </div>
              </div>
        </div>
      </div>
      </a>
      @endforeach
    </div>

  </div>
</section><!-- End Portfolio Section -->

<script>
  $("#todas").click(function() {
    document.getElementById("dynamicDiv").innerHTML = "";
    $("#dynamicDiv").append(`
        @foreach ($plantas as $planta)
            <a href="{{ route('planta.show', ['planta' => $planta->id]) }}">
                <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
                    <div class="portfolio-wrap">
                      <div class="card d-flex align-items-center">
                        <img class="card-img-top p-3" src="{{ $planta->fotos }}">
                          <div class="card-body">
                            @if($tipo == 'minhasPlantas')
                                @if($planta->status == 'cadastrada')
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-primary">Cadastrada</span></h3>
                                @endif
                                @if($planta->status == 'submetida')
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-dark">Em análise</span></h3>
                                @endif
                                @if($planta->status == 'aprovada')
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-success">Aprovada</span></h3>
                                @endif
                                @if($planta->status == 'rejeitada')
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-danger">Rejeitada</span></h3>
                                @endif
                                @else
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} </h3>
                                @endif
                                <p class="card-title text-center" style="color:gray">
                                    <i>{{ $planta->nomeCientifico }}</i>
                                </p>
                                <p style="color:black" class="card-text text-justify">
                                    {!!$planta->caracteristicas!!}
                                </p>

                                @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && !($tipo == 'paraAnalise'))
                                <form class="py-1 text-center" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                                </form>
                              @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>`);
  })
  $("#cadastradas").click(function() {
    document.getElementById("dynamicDiv").innerHTML = "";
    $("#dynamicDiv").append(`
        @foreach ($plantas as $planta)
            @if($planta->status == 'cadastrada')
            <a href="{{ route('planta.show', ['planta' => $planta->id]) }}">
                <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
                    <div class="portfolio-wrap">
                      <div class="card d-flex align-items-center">
                        <img class="card-img-top p-3" src="{{ $planta->fotos }}">
                          <div class="card-body">
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }}<span class="badge badge-primary">Cadastrada</span></h3>
                                <p class="card-title text-center" style="color:gray">
                                    <i>{{ $planta->nomeCientifico }}</i>
                                </p>
                                <p style="color:black" class="card-text text-justify">
                                    {!!$planta->caracteristicas!!}
                                </p>

                                @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && !($tipo == 'paraAnalise'))
                                <form class="py-1 text-center" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>`);
  })
  $("#submetidas").click(function() {
    document.getElementById("dynamicDiv").innerHTML = "";
    $("#dynamicDiv").append(`
        @foreach ($plantas as $planta)
            @if($planta->status == 'submetida')
            <a href="{{ route('planta.show', ['planta' => $planta->id]) }}">
              <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
                      <div class="portfolio-wrap">
                        <div class="card d-flex align-items-center">
                          <img class="card-img-top p-3" src="{{ $planta->fotos }}">
                            <div class="card-body">
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-dark">Em análise</span></h3>
                                <p class="card-title text-center" style="color:gray">
                                    <i>{{ $planta->nomeCientifico }}</i>
                                </p>
                                <p style="color:black" class="card-text text-justify">
                                    {!!$planta->caracteristicas!!}
                                </p>

                                @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && !($tipo == 'paraAnalise'))
                                <form class="py-1 text-center" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>`);
  })
  $("#aprovadas").click(function() {
    document.getElementById("dynamicDiv").innerHTML = "";
    $("#dynamicDiv").append(`
        @foreach ($plantas as $planta)
            @if($planta->status == 'aprovada')
            <a href="{{ route('planta.show', ['planta' => $planta->id]) }}">
              <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
                    <div class="portfolio-wrap">
                      <div class="card d-flex align-items-center">
                        <img class="card-img-top p-3" src="{{ $planta->fotos }}">
                          <div class="card-body">
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-pill badge-success">Aprovada</span></h3>
                                <p class="card-title text-center" style="color:gray">
                                    <i>{{ $planta->nomeCientifico }}</i>
                                </p>
                                <p style="color:black" class="card-text text-justify">
                                    {!!$planta->caracteristicas!!}
                                </p>

                                @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && !($tipo == 'paraAnalise'))
                                <form class="py-1 text-center" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>`);
  })
  $("#rejeitadas").click(function() {
    document.getElementById("dynamicDiv").innerHTML = "";
    $("#dynamicDiv").append(`
        @foreach ($plantas as $planta)
            @if($planta->status == 'rejeitada')
            <a href="{{ route('planta.show', ['planta' => $planta->id]) }}">
            <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
                    <div class="portfolio-wrap">
                      <div class="card d-flex align-items-center">
                        <img class="card-img-top p-3" src="{{ $planta->fotos }}">
                          <div class="card-body">
                                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }} <span class="badge badge-pill badge-danger">Rejeitada</span></h3>
                                <p class="card-title text-center" style="color:gray">
                                    <i>{{ $planta->nomeCientifico }}</i>
                                </p>
                                <p style="color:black" class="card-text text-justify">
                                    {!!$planta->caracteristicas!!}
                                </p>

                                @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()) && !($tipo == 'paraAnalise'))
                                <form class="py-1 text-center" action="{{ route('planta.edit', ['planta' => $planta->id]) }}" method="GET">
                                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>`);
  })
</script>

@endsection