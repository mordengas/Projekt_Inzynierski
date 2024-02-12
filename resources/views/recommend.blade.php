<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wycena</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/> --}}

</head>
<body>
@include('shared.navbar')


<div class="container">

<div class="container">
    <h1 class="text-center">Choose way of recommending games</h1>
</div>


    <ul class="nav nav-tabs justify-content-center" id="myTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab" aria-controls="content1" aria-selected="true">Tab 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab" aria-controls="content2" aria-selected="false">Tab 2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab3" data-bs-toggle="tab" data-bs-target="#content3" type="button" role="tab" aria-controls="content3" aria-selected="false">Tab 3</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1">
            <h3>Content for Tab 1</h3>
            @include('Games.algoWeight')
        </div>
        <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2">
            <h3>Content for Tab 2</h3>
            @include('Games.algo')
        </div>
        <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
            <h3>Content for Tab 3</h3>
        </div>
    </div>

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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
