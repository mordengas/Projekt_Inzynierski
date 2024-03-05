@extends('admin')

@section('table')
<div class="container">
  <h1>Edit Library Entry</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('libraries.update', $library->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="user_id">User</label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $library->user_id }}">
    </div>
    <div class="form-group">
        <label for="game_id">Game</label>
        <input type="text" class="form-control" id="game_id" name="game_id" value="{{ $library->game_id }}">
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <select class="form-control" id="state" name="state">
          <option value="completed" {{ $library->state == 'completed' ? 'selected' : '' }}>Completed</option>
          <option value="playing" {{ $library->state == 'playing' ? 'selected' : '' }}>Playing</option>
          <option value="plan to play" {{ $library->state == 'plan to play' ? 'selected' : '' }}>Plan to Play</option>
        </select>
    </div>
    <div class="form-group">
        <label for="score">Score</label>
        <select class="form-control" id="score" name="score">
          <option value="" {{ $library->score == null ? 'selected' : '' }}>0</option>
          <option value="1" {{ $library->score == '1' ? 'selected' : '' }}>1</option>
          <option value="2" {{ $library->score == '2' ? 'selected' : '' }}>2</option>
          <option value="3" {{ $library->score == '3' ? 'selected' : '' }}>3</option>
          <option value="4" {{ $library->score == '4' ? 'selected' : '' }}>4</option>
          <option value="5" {{ $library->score == '5' ? 'selected' : '' }}>5</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection
