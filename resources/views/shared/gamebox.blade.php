
@if($view === "search")
@foreach($games as $game)
<div class="col">
    <div class="card shadow-sm">
            @if($game->cover === "no cover available")
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c"/>
                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">No Cover Available</text>
            </svg>
            @else
            <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" width="60%" height="50%" class="img-fluid mx-auto" alt="...">
            @endif
        <div class="card-body">
            <h5 class="card-title" >{{ $game->name }}</h5>
            <p class="card-text" style="height: 100px; overflow-y: scroll;">{{$game->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm" >Check Game Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@elseif($view === "recommend")
    @foreach($games as $game)
    <div class="col">
        <div class="card shadow-sm">
                @if($game->cover === "no cover available")
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">No Cover Available</text>
                </svg>
                @else
                <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" width="60%" height="50%" class="img-fluid mx-auto" alt="...">
                @endif
            <div class="card-body">
                <h5 class="card-title" >{{ $game->name }}</h5>
                <p class="card-text" style="height: 100px; overflow-y: scroll;">{{$game->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm" >Check Game Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@elseif($view === "profile")

@foreach($games as $game)
<div class="col">
        <div class="card shadow-sm">
                @if($game->cover === "no cover available")
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">No Cover Available</text>
                </svg>
                @else
                <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" width="60%" height="50%" class="img-fluid mx-auto" alt="...">
                @endif
            <div class="card-body">
                <h5 class="card-title" >{{ $game->name }}</h5>
                <p class="card-text" style="height: 100px; overflow-y: scroll;">{{$game->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm" >Check Game Page</a>
                    </div>
                    <div class="rate disabled">
                        <input type="radio" id="star5_{{$game->id}}" name="score_{{$game->id}}" value="5" {{ App\Models\Library::getScore($user->id, $game->id) == 5 ? 'checked' : '' }} />
                        <label for="star5_{{$game->id}}" title="text">5 stars</label>
                        <input type="radio" id="star4_{{$game->id}}" name="score_{{$game->id}}" value="4" {{ App\Models\Library::getScore($user->id, $game->id) == 4 ? 'checked' : '' }} />
                        <label for="star4_{{$game->id}}" title="text">4 stars</label>
                        <input type="radio" id="star3_{{$game->id}}" name="score_{{$game->id}}" value="3" {{ App\Models\Library::getScore($user->id, $game->id) == 3 ? 'checked' : '' }} />
                        <label for="star3_{{$game->id}}" title="text">3 stars</label>
                        <input type="radio" id="star2_{{$game->id}}" name="score_{{$game->id}}" value="2" {{ App\Models\Library::getScore($user->id, $game->id) == 2 ? 'checked' : '' }} />
                        <label for="star2_{{$game->id}}" title="text">2 stars</label>
                        <input type="radio" id="star1_{{$game->id}}" name="score_{{$game->id}}" value="1" {{ App\Models\Library::getScore($user->id, $game->id) == 1 ? 'checked' : '' }} />
                        <label for="star1_{{$game->id}}" title="text">1 star</label>
                    </div>
                    <a>{{$user->game}}</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif



{{-- <div class="card mb-3" style="max-width: 540px; max-height: 250px;">
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
            <div class="d-flex justify-content-end">
                <a href="{{ url('/game', $game->id) }}" class="btn btn-primary btn-sm stretched-link" >Check Game Page</a>
            </div>
        </div>
      </div>
    </div>
</div> --}}



