@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>User Profile</h1>
            <h2>{{ $user->name}}</h2>
        </div>
        <div class="col-md-6">
            <h1>Library of Games</h1>
            <div style="overflow-y: scroll; height: 600px;">
            @include('shared.gamebox', ['view' => 'profile'])
            </div>
        </div>
    </div>
</div>
@endsection
