@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Profile</h1>
    <div class="row">
        <div class="col-md-2">
            @if($user->image !== "user.png")
            <img class="d-flex justify-content-center align-items-center rounded" src="/images/{{$user->image}}" alt="profile_image" style="height: 140px; background-color: rgb(233, 236, 239);">
            @else
            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
              <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
            </div>
            @endif

        </div>
        <div class="col-md-6">
            <h2>{{ $user->name}}</h2>
            @if(isset($user->description))
            <p style="border: 1px solid grey; border-radius: 5px; height: 100px; width: 500px;">{{ $user->description }}</p>
            @else
            <p style="border: 1px solid grey; border-radius: 5px; height: 100px; width: 500px;">No bio.</p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-row-reverse">
                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Games in library: {{App\Models\Library::countUserGames($user->id)}}</h4>
            </div>
        </div>
    </div>


    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h1>Library of Games</h1>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @include('shared.gamebox', ['view' => 'profile'])
          </div>
        </div>
      </div>

</div>
@endsection
