@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Choose way of recommending games</h1>

    <ul class="nav nav-tabs justify-content-center" id="myTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab" aria-controls="content1" aria-selected="true">By Game Mode</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab" aria-controls="content2" aria-selected="false">By Genre</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab3" data-bs-toggle="tab" data-bs-target="#content3" type="button" role="tab" aria-controls="content3" aria-selected="false">Graph Search</button>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1">
            @include('Games.algoWeight')
        </div>
        <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2">
            @include('Games.algo')
        </div>
        <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
            @include('Games.graph')
        </div>
    </div>

    @if (isset($games))
        @include('shared.gamebox', ['view' => 'recommend'])
    @endif

    @if (isset($recom))
    <h1>Polecane gry dla Ciebie</h1>
    <div class="alert alert-success">
        <p>1.<a href="{{ url('/game', $recom[0]['game_id']) }}">{{ $recom[0]['name'] }}</a></p>
        {{-- <p>  {{ $recom1->game_modes }}</p>
        <p>  {{ $recom1->genres }}</p> --}}
        <img src="{{ App\Http\Controllers\SearchController::getUrlCover($recom[0]['cover']) }}"  width="132" height="176">

    </div>

    <div class="alert alert-success">
        <p>2.<a href="{{ url('/game', $recom[1]['game_id']) }}">{{ $recom[1]['name'] }}</a></p>
        {{-- <p>  {{ $recom2->game_modes }}</p>
        <p>  {{ $recom2->genres }}</p> --}}
        <img src="{{ App\Http\Controllers\SearchController::getUrlCover($recom[1]['cover']) }}"  width="132" height="176">

    </div>

    <div class="alert alert-success">
        <p>3.<a href="{{ url('/game', $recom[2]['game_id']) }}">{{ $recom[2]['name'] }}</a></p>
        {{-- <p>  {{ $recom3->game_modes }}</p>
        <p>  {{ $recom3->genres }}</p> --}}
        <img src="{{ App\Http\Controllers\SearchController::getUrlCover($recom[2]['cover']) }}"  width="132" height="176">

    </div>
    @endif
</div>

@endsection
