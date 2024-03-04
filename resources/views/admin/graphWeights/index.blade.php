@extends('admin')

@section('table')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
    @endif
    @yield('graph')
    <div class="container">
        <br>
        <div class="row d-flex justify-content-between">
            <div class="col">
                <a href="{{ route('graphWeights.create') }}" class="btn btn-primary">Create Graph Weight</a>
            </div>
            <div class="col">
                @livewire('show-graph-modal')
            </div>
        </div>
        <livewire:graph-weights-table />
    </div>
@endsection
