@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Choose way of recommending games</h1>

    @if (isset($activeTab))
    <ul class="nav nav-tabs justify-content-center" id="myTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $activeTab == 'content1' ? 'active' : '' }}" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab" aria-controls="content1" aria-selected="{{ $activeTab == 'content1' ? 'true' : 'false' }}">By Game Mode</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $activeTab == 'content2' ? 'active' : '' }}" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab" aria-controls="content2" aria-selected="{{ $activeTab == 'content2' ? 'true' : 'false' }}">By Genre</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $activeTab == 'content3' ? 'active' : '' }}" id="tab3" data-bs-toggle="tab" data-bs-target="#content3" type="button" role="tab" aria-controls="content3" aria-selected="{{ $activeTab == 'content3' ? 'true' : 'false' }}">Graph Search</button>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade {{ $activeTab == 'content1' ? 'show active' : '' }}" id="content1" role="tabpanel" aria-labelledby="tab1">
            @include('Games.algoWeight')
        </div>
        <div class="tab-pane fade {{ $activeTab == 'content2' ? 'show active' : '' }}" id="content2" role="tabpanel" aria-labelledby="tab2">
            @include('Games.algoGenre')
        </div>
        <div class="tab-pane fade {{ $activeTab == 'content3' ? 'show active' : '' }}" id="content3" role="tabpanel" aria-labelledby="tab3">
            @include('Games.algoGraph')
        </div>
    </div>
    @else

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
            @include('Games.algoGenre')
        </div>
        <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
            @include('Games.algoGraph')

            {{-- @livewire('show-graph-modal') --}}
        </div>
    </div>
    @endif

    @if (isset($games))
        <div class="container">
            <h1>Recommended for you</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @include('shared.gamebox', ['view' => 'recommend'])
            </div>
        </div>
    @endif
</div>

@endsection
