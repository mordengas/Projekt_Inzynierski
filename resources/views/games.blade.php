@extends('layouts.app')

@section('content')
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <h1>Search Results</h1>
        @if(isset($error))
        <h3>{{$error}}</h3>
        @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @include('shared.gamebox', ['view' => 'search'])
          </div>
        @endif
    </div>
  </div>
@endsection
