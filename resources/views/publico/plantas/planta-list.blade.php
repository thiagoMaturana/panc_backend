@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">


      @foreach ($plantas as $planta)
      <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
        <div class="portfolio-wrap">
          <div class="card" style="max-width: 80vw">
            <img class="card-img-top" src="{{ $planta->fotos }}">
            <div class="card-body">
              <h3 class="card-title text-center" style="padding: 0 0 0 5px;">{{ $planta->nome }}</h3>
              <p class="card-title text-center" style="color:gray">
                <i>{{ $planta->nomeCientifico }}</i> </p>
              <p class="card-text text-justify">{{ $planta->caracteristicas }}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Portfolio Section -->

@endsection