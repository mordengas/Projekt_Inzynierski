@extends('admin')

@section('table')
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
            <select class="form-control @error('start') is-invalid @enderror" id="start" name="start" value="{{ $graphWeight->start }}" required>
                <option value="Point-and-click" {{ $graphWeight->start === 'Point-and-click' ? 'selected' : '' }}>Point-and-click</option>
                <option value="Fighting" {{ $graphWeight->start === 'Fighting' ? 'selected' : '' }}>Fighting</option>
                <option value="Shooter" {{ $graphWeight->start === 'Shooter' ? 'selected' : '' }}>Shooter</option>
                <option value="Music" {{ $graphWeight->start === 'Music' ? 'selected' : '' }}>Music</option>
                <option value="Platform" {{ $graphWeight->start === 'Platform' ? 'selected' : '' }}>Platform</option>
                <option value="Puzzle" {{ $graphWeight->start === 'Puzzle' ? 'selected' : '' }}>Puzzle</option>
                <option value="Racing" {{ $graphWeight->start === 'Racing' ? 'selected' : '' }}>Racing</option>
                <option value="Real Time Strategy (RTS)" {{ $graphWeight->start === 'Real Time Strategy (RTS)' ? 'selected' : '' }}>Real Time Strategy (RTS)</option>
                <option value="Role-playing (RPG)" {{ $graphWeight->start === 'Role-playing (RPG)' ? 'selected' : '' }}>Role-playing (RPG)</option>
                <option value="Simulator" {{ $graphWeight->start === 'Simulator' ? 'selected' : '' }}>Simulator</option>
                <option value="Sport" {{ $graphWeight->start === 'Sport' ? 'selected' : '' }}>Sport</option>
                <option value="Strategy" {{ $graphWeight->start === 'Strategy' ? 'selected' : '' }}>Strategy</option>
                <option value="Turn-based strategy (TBS)" {{ $graphWeight->start === 'Turn-based strategy (TBS)' ? 'selected' : '' }}>Turn-based strategy (TBS)</option>
                <option value="Tactical" {{ $graphWeight->start === 'Tactical' ? 'selected' : '' }}>Tactical</option>
                <option value="Hack and slash/Beat 'em up" {{ $graphWeight->start === 'Hack and slash/Beat \'em up' ? 'selected' : '' }}>Hack and slash/Beat 'em up</option>
                <option value="Quiz/Trivia" {{ $graphWeight->start === 'Quiz/Trivia' ? 'selected' : '' }}>Quiz/Trivia</option>
                <option value="Pinball" {{ $graphWeight->start === 'Pinball' ? 'selected' : '' }}>Pinball</option>
                <option value="Adventure" {{ $graphWeight->start === 'Adventure' ? 'selected' : '' }}>Adventure</option>
                <option value="Indie" {{ $graphWeight->start === 'Indie' ? 'selected' : '' }}>Indie</option>
                <option value="Arcade" {{ $graphWeight->start === 'Arcade' ? 'selected' : '' }}>Arcade</option>
                <option value="Visual Novel" {{ $graphWeight->start === 'Visual Novel' ? 'selected' : '' }}>Visual Novel</option>
                <option value="Card & Board Game" {{ $graphWeight->start === 'Card & Board Game' ? 'selected' : '' }}>Card & Board Game</option>
                <option value="MOBA" {{ $graphWeight->start === 'MOBA' ? 'selected' : '' }}>MOBA</option>
              </select>
            @error('start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="destination">Destination:</label>
            <select class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" value="{{ $graphWeight->destination }}" required>
                <option value="Point-and-click" {{ $graphWeight->destination === 'Point-and-click' ? 'selected' : '' }}>Point-and-click</option>
                <option value="Fighting" {{ $graphWeight->destination === 'Fighting' ? 'selected' : '' }}>Fighting</option>
                <option value="Shooter" {{ $graphWeight->destination === 'Shooter' ? 'selected' : '' }}>Shooter</option>
                <option value="Music" {{ $graphWeight->destination === 'Music' ? 'selected' : '' }}>Music</option>
                <option value="Platform" {{ $graphWeight->destination === 'Platform' ? 'selected' : '' }}>Platform</option>
                <option value="Puzzle" {{ $graphWeight->destination === 'Puzzle' ? 'selected' : '' }}>Puzzle</option>
                <option value="Racing" {{ $graphWeight->destination === 'Racing' ? 'selected' : '' }}>Racing</option>
                <option value="Real Time Strategy (RTS)" {{ $graphWeight->destination === 'Real Time Strategy (RTS)' ? 'selected' : '' }}>Real Time Strategy (RTS)</option>
                <option value="Role-playing (RPG)" {{ $graphWeight->destination === 'Role-playing (RPG)' ? 'selected' : '' }}>Role-playing (RPG)</option>
                <option value="Simulator" {{ $graphWeight->destination === 'Simulator' ? 'selected' : '' }}>Simulator</option>
                <option value="Sport" {{ $graphWeight->destination === 'Sport' ? 'selected' : '' }}>Sport</option>
                <option value="Strategy" {{ $graphWeight->destination === 'Strategy' ? 'selected' : '' }}>Strategy</option>
                <option value="Turn-based strategy (TBS)" {{ $graphWeight->destination === 'Turn-based strategy (TBS)' ? 'selected' : '' }}>Turn-based strategy (TBS)</option>
                <option value="Tactical" {{ $graphWeight->destination === 'Tactical' ? 'selected' : '' }}>Tactical</option>
                <option value="Hack and slash/Beat 'em up" {{ $graphWeight->destination === 'Hack and slash/Beat \'em up' ? 'selected' : '' }}>Hack and slash/Beat 'em up</option>
                <option value="Quiz/Trivia" {{ $graphWeight->destination === 'Quiz/Trivia' ? 'selected' : '' }}>Quiz/Trivia</option>
                <option value="Pinball" {{ $graphWeight->destination === 'Pinball' ? 'selected' : '' }}>Pinball</option>
                <option value="Adventure" {{ $graphWeight->destination === 'Adventure' ? 'selected' : '' }}>Adventure</option>
                <option value="Indie" {{ $graphWeight->destination === 'Indie' ? 'selected' : '' }}>Indie</option>
                <option value="Arcade" {{ $graphWeight->destination === 'Arcade' ? 'selected' : '' }}>Arcade</option>
                <option value="Visual Novel" {{ $graphWeight->destination === 'Visual Novel' ? 'selected' : '' }}>Visual Novel</option>
                <option value="Card & Board Game" {{ $graphWeight->destination === 'Card & Board Game' ? 'selected' : '' }}>Card & Board Game</option>
                <option value="MOBA" {{ $graphWeight->destination === 'MOBA' ? 'selected' : '' }}>MOBA</option>
              </select>
            @error('destination')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" min="1" max="10" value="{{ $graphWeight->weight }}" required>
            @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
@endsection
