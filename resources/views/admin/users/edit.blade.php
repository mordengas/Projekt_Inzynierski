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
  <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="POST">
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
    @if($user->role === "user")
    <div class="mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="isAdmin" name="isAdmin">
        <label class="form-check-label" for="flexCheckDefault">
          Admin
        </label>
    </div>
    @else
    <div class="mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="isAdmin" name="isAdmin" checked>
        <label class="form-check-label" for="flexCheckDefault">
          Admin
        </label>
    </div>
    @endif

    <div class="mb-3">
        <div class="row">

            <div class="col-1">
            @if($user->image !== "user.png")

                <img class="d-flex justify-content-center align-items-center rounded" src="/images/{{$user->image}}" alt="profile_image" style="height: 80px; background-color: rgb(233, 236, 239);">
            @else
                <div class="d-flex justify-content-center align-items-center rounded" style="height: 80px; background-color: rgb(233, 236, 239);">
                    <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">80x80</span>
                </div>
            @endif
            </div>

            <div class="col-11">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="deleteImage" name="deleteImage">
        <label class="form-check-label" for="flexCheckDefault">
          Delete Image
        </label>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Edit User</button>
  </form>
</div>
@endsection
