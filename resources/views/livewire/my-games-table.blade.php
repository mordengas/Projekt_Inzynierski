<div>
    <div class="container mt-4 mb-6">
        <div class="row mb-4">
          <div class="col-md-6">
            <input type="text" class="form-control form-control-sm" wire:model.live.debounce.300ms="search" placeholder="Search Games...">
          </div>
          <div class="col-md-2">
            <select class="form-control form-control-sm" wire:model.live="orderBy">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              <option value="id">ID</option>
              <option value="name">Name</option>
              <option value="rating">Rating</option>
              <option value="ratingc">Rating Count</option>
              <option value="release_date">Release Date</option>
            </select>
          </div>
          <div class="col-md-2">
            <select class="form-control form-control-sm" wire:model.live="orderAsc">
              <option value="1">Ascending</option>
              <option value="0">Descending</option>
            </select>
          </div>
          <div class="col-md-2">
            <select class="form-control form-control-sm" wire:model.live="perPage">
              <option>10</option>
              <option>25</option>
              <option>50</option>
              <option>100</option>
            </select>
          </div>
        </div>
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Rating</th>
              <th scope="col">Rating Count</th>
              <th scope="col">Game Modes</th>
              <th scope="col">Genres</th>
              <th scope="col">Platforms</th>
              <th scope="col">Release Date</th>
              <th scope="col">Description</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($games as $game)
            <tr>
              <td>{{ $game->id }}</td>
              <td>
                <a class="link-body-emphasis text-decoration-none" href="{{ url('/game', $game->id) }}">{{$game->name }}</a>
              </td>
              <td>{{ (int)$game->rating }}</td>
              <td>{{ $game->ratingc }}</td>
              <td>{{ $game->game_modes }}</td>
              <td>{{ $game->genres }}</td>
              <td>{{ $game->platforms }}</td>
              <td>{{ $game->release_date }}</td>
              <td>{{ Str::limit($game->description, 50, '...') }}</td>
              <td>
                <form action="{{ route('games.destroy',[$game]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $games->links() !!}
      </div>
</div>
