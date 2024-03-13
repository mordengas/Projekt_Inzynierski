@extends('admin')

@section('table')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
        <br>
        {{-- <a href="{{ route('comments.create') }}" class="btn btn-primary">Create Comment</a> --}}
        <livewire:comments-table />
    </div>
@endsection
