@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>User Profile</h1>
        <div class="col-md-2">
            @if($user->image)
            <img class="d-flex justify-content-center align-items-center rounded" src="/images/{{$user->image}}" alt="profile_image" style="height: 140px; background-color: rgb(233, 236, 239);">
            @else
            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
              <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
            </div>
            @endif

        </div>
        <div class="col-md-6">
            <h2>{{ $user->name}}</h2>
            <p>{{ $user->description }}</p>
        </div>
        <h1>Library of Games</h1>
        <div style="overflow-y: scroll; height: 600px;">
            @include('shared.gamebox', ['view' => 'profile'])
        </div>

    </div>
</div>
@endsection
