@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$game->name}}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ App\Http\Controllers\SearchController::getUrl($game) }}" alt="Game Image" width="264" height="352">
        </div>
        <div class="col-md-6">

            @if(auth()->check())
                @if( App\Models\Library::hasGameInLibrary(auth()->user()->id ,$game->id))
                    <button class="btn btn-primary float-right" disabled>In Library</button>
                @else
                    <form action="/library/add/{{$game->id}}/{{auth()->user()->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <button type="submit" class="btn btn-primary float-right">Add to Library</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>

<div class="container">

    <h2>Comments</h2>
        @include('shared.commentbox')
    <h2>Add Comment</h2>

    @if(auth()->check())
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="game_id" value="{{(int)$game->id}}">
        <input type="hidden" name="user_id" value="{{auth()->user()->id }}">
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>

    @endif

</div>
@endsection
