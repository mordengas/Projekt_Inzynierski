@extends('admin')

@section('table')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
        <br>
        <livewire:my-games-table />
    </div>
@endsection
