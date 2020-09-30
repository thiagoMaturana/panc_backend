@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">

      @foreach ($receitas as $receita)
      <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
        <div class="portfolio-wrap">
          <div class="card" style="max-width: 50vw">
            <img class="card-img-top" src="{{ $receita->fotos }}">
            <div class="card-body">
              <h5 class="card-title text-center" style="padding: 0 0 0 10px; color:gray">{{ $receita->tipo }}</h5>
              <h3 class="card-title text-center" style="padding: 5px;">{{ $receita->nome }}</h3>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Portfolio Section -->

@endsection