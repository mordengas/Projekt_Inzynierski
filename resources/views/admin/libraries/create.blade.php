@extends('admin')

@section('table')
<div class="container">
  <h1>Create Library Entry</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('libraries.store') }}" method="POST">
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
        <label for="state">State</label>
        <select class="form-control" id="state" name="state">
          <option value="completed">Completed</option>
          <option value="playing">Playing</option>
          <option value="plan to play">Plan to Play</option>
        </select>
      </div>
      <div class="form-group">
        <label for="score">Score</label>
        <select class="form-control" id="score" name="score">
          <option value="">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
    <br>
    <button type="submit" class="btn btn-primary">Create library Entry</button>
</form>
</div>
@endsection
