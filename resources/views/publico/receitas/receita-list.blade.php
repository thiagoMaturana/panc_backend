@extends('publico.layout')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light section-bg sticky-top justify-content-center">
  @if($tipoPg == 'todasReceitas')
  <form class="text-center py-3" action="{{ route('receita.search') }}" method="GET">
    <div class="form-row">
      <div class="form-group col-md-11">
        @if($nome ?? '')
        <input type="search" class="form-control" name="search" placeholder="Procure por nome ou nome da planta" value="{{$nome}}">
        @else
        <input type="search" class="form-control" name="search" placeholder="Procure por nome ou nome da planta">
        @endif
      </div>
      <div class="form-group col-md-1">
        <button type="submit" class="btn btn-outline-primary form-control"><i class='bx bx-search-alt bx-sm'></i></button>
      </div>
    </div>
    <div class="form-row pl-2">
      <div class="form-check form-check-inline">
        @if(!empty($tipo[0]) && $tipo[0] == 'Doces e Bolos' ?? '')
        <input class="form-check-input" id="chk-doce" type="checkbox" name="tipo[]" value="Doces e Bolos" checked>
        @else
        <input class="form-check-input" id="chk-doce" type="checkbox" name="tipo[]" value="Doces e Bolos">
        @endif
        <label class="form-check-label" for="chk-doce">Doces e Bolos</label>
      </div>
      <div class="form-check form-check-inline">
        @if(!empty($tipo[1]) && $tipo[1] == 'Carnes' ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Carnes" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Carnes">
        @endif
        <label class="form-check-label">Carnes</label>
      </div>
      <div class="form-check form-check-inline">
        @if(!empty($tipo[2]) && $tipo[2] == 'Saladas, Molhos e Acompanhamentos' ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Saladas, Molhos e Acompanhamentos" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Saladas, Molhos e Acompanhamentos">
        @endif
        <label class="form-check-label">Saladas, Molhos e Acompanhamentos</label>
      </div>
      <div class="form-check form-check-inline">
        @if(!empty($tipo[3]) && $tipo[3] == 'Sopas' ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Sopas" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Sopas">
        @endif
        <label class="form-check-label">Sopas</label>
      </div>
      <div class="form-check form-check-inline">
        @if(!empty($tipo[4]) && $tipo[4] == 'Massas' ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Massas" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Massas">
        @endif
        <label class="form-check-label">Massas</label>
      </div>
      <div class="form-check form-check-inline">
        @if(!empty($tipo[5]) && $tipo[5] == 'Bebidas' ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Bebidas" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Bebidas">
        @endif
        <label class="form-check-label">Bebidas</label>
      </div>
      <div class="form-check form-check-inline">
        @if(!empty($tipo[6]) && $tipo[6] == 'Prato principal' ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Prato principal" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[]" value="Prato principal">
        @endif
        <label class="form-check-label">Prato principal</label>
      </div>
    </div>
  </form>
  @endif
</nav>

<section id="portfolio" class="portfolio section-bg p-0 m-0">
  @if($error)
  <div class="alert alert-primary text-center" role="alert">
    {{$error}}
  </div>
  @endif

  <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">

    @foreach ($receitas as $receita)
    <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
      <div class="portfolio-wrap">
        <div class="card d-flex align-items-center">
          <a href="{{ route('receita.show', ['receita' => $receita->id]) }}">
            <img class="card-img-top p-3" src="{{ $receita->fotos }}">
            <div class="card-body">
              <h5 class="card-title text-center" style="padding: 0 0 0 10px; color:gray">{{ $receita->tipo }}</h5>
              <h3 class="card-title text-center" style="padding: 5px;">{{ $receita->nome }}</h3>
            </div>
        </div>
      </div>
      </a>
    </div>
    @endforeach
  </div>

  </div>
</section><!-- End Portfolio Section -->

@endsection