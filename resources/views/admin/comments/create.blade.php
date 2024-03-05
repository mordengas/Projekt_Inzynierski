@extends('admin')

@section('table')
<div class="container">
  <h1>Create Comment</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="user_id">User</label>
        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
    </div>
    <div class="form-group">
        <label for="game_id">Game</label>
        <input type="text" class="form-control" id="game_id" name="game_id" placeholder="Game ID">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" class="form-control" id="content" name="content" placeholder="Content"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
@endsection
