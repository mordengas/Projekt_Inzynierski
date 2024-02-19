@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$game->name}}</h1>
    <div class="row">
        <div class="col-md-3">
            {{-- <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" alt="Game Image" width="264" height="352"> --}}
            @if($game->cover === "no cover available")
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" class="img-fluid rounded-start" width="264" height="352" alt="...">
            @else
            <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" class="img-fluid rounded-start" width="264" height="352" alt="...">
            @endif
        </div>
        <div class="col-md-6">
            <p>{{$game->description}}</p>
            <div class="row">
                <div class="col-md-6">
                    <p>Game Modes: {{App\Models\MyGame::gameModesToString($game->game_modes)}}</p>
                    <p>Genres: {{App\Models\MyGame::genresToString($game->genres)}}</p>
                    <p>Release Year: {{ date('Y', strtotime($game->release_date)) }}</p>
                </div>
                <div class="col-md-6">
                    <p>Rating: {{$game->rating}}</p>
                    <p>Rating Count: {{$game->ratingc}}</p>
                    <p>Platform: {{App\Models\MyGame::platformsToString($game->platforms)}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @guest

            @else
            <div class="d-flex flex-row-reverse">

            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{App\Models\Library::getGameState(auth()->user()->id ,$game->id)}}</a>

                <form action="{{route('library.setState')}}" method="POST">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <ul class="dropdown-menu">
                    <button class="dropdown-item" type="submit" name="state" value="plan to play">Want to play</button>
                    <button class="dropdown-item" type="submit" name="state" value="playing">Playing</button>
                    <button class="dropdown-item" type="submit" name="state" value="completed">Finished</button>
                </ul>
                </form>
              </div>


            @if(auth()->check())
            @if( App\Models\Library::hasGameInLibrary(auth()->user()->id, $game->id))
                <button class="btn btn-primary float-right" disabled>In Library</button>
            @else
                <form action="{{route('library.addGame')}}" method="POST">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary float-right">Add to Library</button>
                </form>
            @endif
            @endif

                <form action="{{ route('library.setScore') }}" method="POST">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    @if(auth()->check())
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    @endif
                <div class="rate">
                    <input type="radio" id="star5" name="score" value="5" {{ App\Models\Library::getScore(auth()->user()->id, $game->id) == 5 ? 'checked' : '' }} />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="score" value="4" {{ App\Models\Library::getScore(auth()->user()->id, $game->id) == 4 ? 'checked' : '' }} />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="score" value="3" {{ App\Models\Library::getScore(auth()->user()->id, $game->id) == 3 ? 'checked' : '' }} />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="score" value="2" {{ App\Models\Library::getScore(auth()->user()->id, $game->id) == 2 ? 'checked' : '' }} />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="score" value="1" {{ App\Models\Library::getScore(auth()->user()->id, $game->id) == 1 ? 'checked' : '' }} />
                    <label for="star1" title="text">1 star</label>
                </div>
                </form>

                <script>
                    document.querySelectorAll('input[type="radio"]').forEach((input) => {
                        input.addEventListener('click', () => {
                            input.form.submit();
                        });
                    });
                </script>
                @endguest
            </div>
        </div>
        <h3>Add Comment</h3>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="game_id" value="{{(int)$game->id}}">
            @if(auth()->check())
            <input type="hidden" name="user_id" value="{{auth()->user()->id }}">
            @endif
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <br>
            <div class="d-flex justify-content-end">
                @if(auth()->check())
                <button type="submit" class="btn btn-primary">Add Comment</button>
                @else
                <button type="submit" class="btn btn-primary" disabled>Add Comment</button>
                @endif
            </div>
        </form>

        <h2>Comments</h2>
        @include('shared.commentbox')
    </div>
</div>
@endsection
