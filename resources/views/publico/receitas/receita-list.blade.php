@extends('publico.layout')

@section('content')

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <form class="text-center" action="{{ route('receita.search') }}" method="GET">
      <div class="form-row">
        <div class="form-group col-md-10">
          <input type="search" class="form-control" name="search" placeholder="Procure por nome">
        </div>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-outline-primary form-control">Procurar</button>
        </div>
      </div>
    </form>

    <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">

      @foreach ($receitas as $receita)
      <a href="{{ route('publico.receita.detail', ['receita' => $receita->id]) }}">
        <div class="portfolio-item col-lg-12 d-flex justify-content-center align-items-stretch">
          <div class="portfolio-wrap">
            <div class="card" style="max-width: 50vw">
              <img class="card-img-top" src="{{ $receita->fotos }}">
              <div class="card-body">
                <h5 class="card-title text-center" style="padding: 0 0 0 10px; color:gray">{{ $receita->tipo }}</h5>
                <h3 class="card-title text-center" style="padding: 5px;">{{ $receita->nome }}</h3>
                <form class="py-1 text-center" action="{{ route('publico.receita.editForm', ['receita' => $receita->id]) }}" method="GET">
                  <input type="submit" class="btn btn-outline-primary" value="Editar"></input>
                </form>
                <form class="py-1 text-center" action="{{ route('publico.receita.destroy', ['receita' => $receita->id]) }}" method="POST">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="user" value="">
                  <input type="submit" class="btn btn-outline-danger" value="Remover">
                </form>
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