@extends('admin')

@section('table')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
        <br>
        {{-- <a href="{{ route('libraries.create') }}" class="btn btn-primary">Create Library Entry</a> --}}
        <livewire:libraries-table />
    </div>
@endsection
