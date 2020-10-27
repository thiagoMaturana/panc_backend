@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

      <form class="text-center" action="{{ route('planta.search') }}" method="GET">
        <div class="form-row">
          <div class="form-group col-md-10">
            <input type="search" class="form-control" name="search" placeholder="Procure por nome ou nome cientifíco...">
          </div>
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-outline-primary form-control">Procurar</button>
          </div>
        </div>
      </form>

    <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">

      @foreach ($plantas as $planta)

      <a href="{{ route('publico.planta.detail', ['planta' => $planta->id]) }}">
        <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
          <div class="portfolio-wrap">
            <div class="card" style="max-width: 80vw">
              <img class="card-img-top" src="{{ $planta->fotos }}">
              <div class="card-body">
                <h3 class="card-title text-center" style="padding: 0 0 0 5px; color:black">{{ $planta->nome }}</h3>
                <p class="card-title text-center" style="color:gray">
                  <i>{{ $planta->nomeCientifico }}</i> </p>
                <p style="color:black" class="card-text text-justify">{{ $planta->caracteristicas }}</p>
                <form class="py-1 text-center" action="{{ route('publico.planta.editForm', ['planta' => $planta->id]) }}" method="GET">
                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                </form>
                <form class="py-1 text-center" action="{{ route('publico.planta.destroy', ['planta' => $planta->id]) }}" method="POST">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="user" value="">
                  <input type="submit" class="btn btn-outline-danger" value="Remover">
                </form>
              </div>
            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>

  </div>
</section><!-- End Portfolio Section -->

@endsection