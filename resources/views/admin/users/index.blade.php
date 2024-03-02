@extends('admin')

@section('table')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
        <br>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        <livewire:users-table />
    </div>
@endsection
