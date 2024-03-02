@extends('layouts.app')

@section('content')
      <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($games as $key => $game )
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img class="bd-placeholder-img" width="100%" height="100%" src="{{ App\Http\Controllers\HomeController::getUrl($game) }}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <div class="container">
                  <div class="carousel-caption text-start" style=" background-color: rgba(0, 0, 0, 0.4); padding: 20px; color: white;">
                    <h1>{{$game->name}}</h1>
                    <p class="opacity-75">{{$game->description}}</p>
                    <p><a class="btn btn-lg btn-primary" href="{{ url('/game', $game->id) }}">Check out Game</a></p>
                  </div>
                </div>
              </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            @foreach ($games as $game)
            <div class="col-lg-4">
                <img class="bd-placeholder-img" width="140" height="140" src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2 class="fw-normal">{{$game->name}}</h2>
                <p>{{$game->description}}</p>
                <p><a class="btn btn-secondary" href="{{ url('/game', $game->id) }}">Check out Game &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
            @endforeach

        </div><!-- /.row -->
      </div>
@endsection
