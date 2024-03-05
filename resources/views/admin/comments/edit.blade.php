@extends('admin')

@section('table')
<div class="container">
  <h1>Edit Comment</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="user_id">User</label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $comment->user_id }}">
    </div>
    <div class="form-group">
        <label for="game_id">Game</label>
        <input type="text" class="form-control" id="game_id" name="game_id" value="{{ $comment->game_id }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" class="form-control" id="content" name="content" placeholder="Content">{{ $comment->content }}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Edit Comment</button>
</form>
</div>
@endsection
