@extends('admin')

@section('table')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
        <br>
        {{-- <a href="{{ route('likes.create') }}" class="btn btn-primary">Create Like</a> --}}
        <livewire:likes-table />
    </div>
@endsection
