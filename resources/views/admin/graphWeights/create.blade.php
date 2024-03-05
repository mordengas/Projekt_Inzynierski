@extends('admin')

@section('table')
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
            <select class="form-control @error('start') is-invalid @enderror" id="start" name="start" required>
                <option value="Point-and-click">Point-and-click</option>
                <option value="Fighting">Fighting</option>
                <option value="Shooter">Shooter</option>
                <option value="Music">Music</option>
                <option value="Platform">Platform</option>
                <option value="Puzzle">Puzzle</option>
                <option value="Racing">Racing</option>
                <option value="Real Time Strategy (RTS)">Real Time Strategy (RTS)</option>
                <option value="Role-playing (RPG)">Role-playing (RPG)</option>
                <option value="Simulator">Simulator</option>
                <option value="Sport">Sport</option>
                <option value="Strategy">Strategy</option>
                <option value="Turn-based strategy (TBS)">Turn-based strategy (TBS)</option>
                <option value="Tactical">Tactical</option>
                <option value="Hack and slash/Beat 'em up">Hack and slash/Beat 'em up</option>
                <option value="Quiz/Trivia">Quiz/Trivia</option>
                <option value="Pinball">Pinball</option>
                <option value="Adventure">Adventure</option>
                <option value="Indie">Indie</option>
                <option value="Arcade">Arcade</option>
                <option value="Visual Novel">Visual Novel</option>
                <option value="Card & Board Game">Card & Board Game</option>
                <option value="MOBA">MOBA</option>
              </select>
            @error('start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="destination">Destination:</label>
            <select class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" required>
                <option value="Point-and-click">Point-and-click</option>
                <option value="Fighting">Fighting</option>
                <option value="Shooter">Shooter</option>
                <option value="Music">Music</option>
                <option value="Platform">Platform</option>
                <option value="Puzzle">Puzzle</option>
                <option value="Racing">Racing</option>
                <option value="Real Time Strategy (RTS)">Real Time Strategy (RTS)</option>
                <option value="Role-playing (RPG)">Role-playing (RPG)</option>
                <option value="Simulator">Simulator</option>
                <option value="Sport">Sport</option>
                <option value="Strategy">Strategy</option>
                <option value="Turn-based strategy (TBS)">Turn-based strategy (TBS)</option>
                <option value="Tactical">Tactical</option>
                <option value="Hack and slash/Beat 'em up">Hack and slash/Beat 'em up</option>
                <option value="Quiz/Trivia">Quiz/Trivia</option>
                <option value="Pinball">Pinball</option>
                <option value="Adventure">Adventure</option>
                <option value="Indie">Indie</option>
                <option value="Arcade">Arcade</option>
                <option value="Visual Novel">Visual Novel</option>
                <option value="Card & Board Game">Card & Board Game</option>
                <option value="MOBA">MOBA</option>
              </select>

            @error('destination')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" min="1" max="10" required>
            @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
