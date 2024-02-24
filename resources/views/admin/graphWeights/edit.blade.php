@extends('admin')

@section('content')
    <h1>Edit Graph Weight</h1>
    <div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('graphWeights.update', $graphWeight->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="start">Start:</label>
            <input type="text" class="form-control @error('start') is-invalid @enderror" id="start" name="start" value="{{ $graphWeight->start }}" required>
            @error('start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="destination">Destination:</label>
            <input type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" value="{{ $graphWeight->destination }}" required>
            @error('destination')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" step="0.01" value="{{ $graphWeight->weight }}" required>
            @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
@endsection
