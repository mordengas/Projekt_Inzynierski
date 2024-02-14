
@if($view === "search")
    <h3>Search Results</h3>
    @foreach($games as $game)
    <div class="card bg-gray" style="margin-bottom: 10px;">
        @if($game->cover != null && $game->cover != "no cover aviable")
        <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}"  width="132" height="176" alt="Game Image" class="img-fluid">
        @endif
        <a href="{{ url('/game', $game->id) }}">{{ $game->name }}</a>
    </div>
    @endforeach

@elseif($view === "recommend")
    <h3>Recommended Games</h3>
    @foreach($games as $game)
    <div class="card bg-gray" style="margin-bottom: 10px;">
        @if($game->cover != null && $game->cover != "no cover aviable")
        <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}"  width="132" height="176" alt="Game Image" class="img-fluid">
        @endif
        <a href="{{ url('/game', $game->id) }}">{{ $game->name }}</a>
    </div>
    @endforeach

@elseif($view === "profile")
    <h3>User's Games</h3>
    @foreach($games as $game)
    <div class="card bg-gray" style="margin-bottom: 10px;">
        @if($game->cover != null && $game->cover != "no cover aviable")
        <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}"  width="132" height="176" alt="Game Image" class="img-fluid">
        @endif
        <a href="{{ url('/game', $game->id) }}">{{ $game->name }}</a>
    </div>
    @endforeach
@endif
