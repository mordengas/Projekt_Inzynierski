
@if($view === "search")
    <div class="card" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            @if($game->cover === "no cover available")
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" class="img-fluid rounded-start" alt="...">
            @else
            <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" class="img-fluid rounded-start" alt="...">
            @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" >{{ $game->name }}</h5>
              <p class="card-text">{{$game->description}}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm stretched-link" >Check Game Page</a>
                </div>
            </div>
          </div>
        </div>
    </div>


@elseif($view === "recommend")
    <h3>Recommended Games</h3>
    @foreach($games as $game)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            @if($game->cover === "no cover available")
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" class="img-fluid rounded-start" alt="...">
            @else
            <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" class="img-fluid rounded-start" alt="...">
            @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" >{{ $game->name }}</h5>
              <p class="card-text">{{$game->description}}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm stretched-link" >Check Game Page</a>
                </div>
            </div>
          </div>
        </div>
    </div>
    @endforeach

@elseif($view === "profile")
@foreach($games as $game)
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        @if($game->cover === "no cover available")
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" class="img-fluid rounded-start" alt="...">
        @else
        <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" class="img-fluid rounded-start" alt="...">
        @endif
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title" >{{ $game->name }}</h5>
          <p class="card-text">{{$game->description}}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm stretched-link" >Check Game Page</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endforeach
@endif


