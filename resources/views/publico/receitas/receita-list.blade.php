@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    @if($tipoPg == 'todasReceitas')
    <form class="text-center py-3" action="{{ route('receita.search') }}" method="GET">
      <div class="form-row">
        <div class="form-group col-md-10">
          @if($nome ?? '')
          <input type="search" class="form-control" name="search" placeholder="Procure por nome ou nome da planta" value="{{$nome}}">
          @else
          <input type="search" class="form-control" name="search" placeholder="Procure por nome ou nome da planta">
          @endif
        </div>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-outline-primary form-control">Procurar</button>
        </div>
      </div>

      <div class="form-check form-check-inline">
        @if($tipo[1] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[1]" value="Doces e Bolos" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[1]" value="Doces e Bolos">
        @endif
        <label class="form-check-label">Doces e Bolos</label>
      </div>
      <div class="form-check form-check-inline">
        @if($tipo[2] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[2]" value="Carnes" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[2]" value="Carnes">
        @endif
        <label class="form-check-label">Carnes</label>
      </div>
      <div class="form-check form-check-inline">
        @if($tipo[3] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[3]" value="Frutos do Mar" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[3]" value="Frutos do Mar">
        @endif
        <label class="form-check-label">Frutos do Mar</label>
      </div>
      <div class="form-check form-check-inline">
        @if($tipo[4] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[4]" value="Saladas, Molhos e Acompanhamentos" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[4]" value="Saladas, Molhos e Acompanhamentos">
        @endif
        <label class="form-check-label">Saladas, Molhos e Acompanhamentos</label>
      </div>
      <div class="form-check form-check-inline">
        @if($tipo[5] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[5]" value="Sopas" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[5]" value="Sopas">
        @endif
        <label class="form-check-label">Sopas</label>
      </div>
      <div class="form-check form-check-inline">
        @if($tipo[6] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[6]" value="Massas" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[6]" value="Massas">
        @endif
        <label class="form-check-label">Massas</label>
      </div>
      <div class="form-check form-check-inline">
        @if($tipo[7] ?? '')
        <input class="form-check-input" type="checkbox" name="tipo[7]" value="Bebidas" checked>
        @else
        <input class="form-check-input" type="checkbox" name="tipo[7]" value="Bebidas">
        @endif
        <label class="form-check-label">Bebidas</label>
      </div>
    </form>
    @endif

    <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">

      @foreach ($receitas as $receita)
      @if($tipoPg == 'minhasReceitas')
      <a href="{{ route('publico.receita.showReceitaMinhaReceita', ['receita' => $receita->id]) }}">
        @else
        <a href="{{ route('publico.receita.show', ['receita' => $receita->id]) }}">
          @endif
          <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
            <div class="portfolio-wrap">
              <div class="card" style="max-width: 50vw">
                <img class="card-img-top img-fluid" src="{{ $receita->fotos }}">
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