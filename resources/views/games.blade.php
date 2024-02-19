@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-1 g-4">
    @foreach($games as $game)
    @include('shared.gamebox', ['view' => 'search'])
    @endforeach
    </div>
</div>
@endsection
