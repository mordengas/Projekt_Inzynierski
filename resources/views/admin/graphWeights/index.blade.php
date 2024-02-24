@extends('admin')

@section('content')
<h1>Graph Weights</h1>
    {{-- <div class="container-fludid">
    <h1>Graph Weights</h1>
    <a href="{{ route('graphWeights.create') }}" class="btn btn-primary">Create Graph Weight</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Start</th>
                <th>Destination</th>
                <th>Weight</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graphWeights as $graphWeight)
                <tr>
                    <td>{{ $graphWeight->start }}</td>
                    <td>{{ $graphWeight->destination }}</td>
                    <td>{{ $graphWeight->weight }}</td>
                    <td>
                        <a href="{{ route('graphWeights.edit',[$graphWeight]) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div> --}}
@endsection
