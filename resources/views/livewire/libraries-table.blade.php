<div>
    <div class="container mt-4 mb-6">
        <div class="row mb-4">
          <div class="col-md-6">
            <input type="text" class="form-control form-control-sm" wire:model.live.debounce.300ms="search" placeholder="Search libraries...">
          </div>
          <div class="col-md-2">
            <select class="form-control form-control-sm" wire:model.live="orderBy">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              <option value="id">ID</option>
              <option value="user_id">User</option>
              <option value="game_id">Game</option>
              <option value="state">State</option>
              <option value="score">Score</option>
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
              <th scope="col">User</th>
              <th scope="col">Game</th>
              <th scope="col">State</th>
              <th scope="col">Score</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($libraries as $library)
            <tr>
              <td>{{ $library->id }}</td>
              <td>{{ $library->user->name }}</td>
              <td>{{ $library->game_id }}</td>
              <td>{{ $library->state }}</td>
              <td>{{ $library->score }}</td>
              <td>
                <a href="{{ route('libraries.edit',[$library]) }}" class="btn btn-success btn-sm">Edit</a>
              </td>
              <td>
                <form action="{{ route('libraries.destroy',[$library]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $libraries->links() !!}
      </div>
</div>
