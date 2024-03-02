@extends('admin')

@section('table')
<div class="container">
  <h1>Edit User</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control">{{ $user->description }}</textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Edit User</button>
  </form>
</div>
@endsection
