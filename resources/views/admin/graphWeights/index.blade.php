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
        <div class="d-flex flex-row-reverse justify-content-between">
            <div class="col-md-1.5">
                @livewire('show-graph-modal')
            </div>
            <div class="col-md-1.5">
                <a href="{{ route('graphWeights.create') }}" class="btn btn-primary">Create Graph Weight</a>
            </div>
        </div>
        <livewire:graph-weights-table />
    </div>
@endsection
