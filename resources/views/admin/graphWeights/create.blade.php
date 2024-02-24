@extends('admin')

@section('content')
    <h1>Create Graph Weight</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('graphWeights.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start">Start:</label>
            <input type="text" class="form-control @error('start') is-invalid @enderror" id="start" name="start" required>
            @error('start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="destination">Destination:</label>
            <input type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" required>
            @error('destination')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="range" class="form-control-range @error('weight') is-invalid @enderror" id="weight" name="weight" min="1" max="10" required>
            @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
