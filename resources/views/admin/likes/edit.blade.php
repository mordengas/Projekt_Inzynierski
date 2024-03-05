@extends('admin')

@section('table')
<div class="container">
  <h1>Edit Like</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('likes.update', $like->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="user_id">User</label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{$like->user_id}}">
    </div>
    <div class="form-group">
        <label for="game_id">Comment</label>
        <input type="text" class="form-control" id="comment_id" name="comment_id" value="{{$like->comment_id}}">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Edit Like</button>
</form>
</div>
@endsection
