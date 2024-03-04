{{-- <div>
    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input wire:model.live.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search weights...">
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model.live="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="id">ID</option>
                <option value="start">Start</option>
                <option value="destination">Destination</option>
                <option value="weight">weight</option>

            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model.live="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model.live="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>
    <table class="table-auto w-full mb-6">
        <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Start</th>
            <th class="px-4 py-2">Destination</th>
            <th class="px-4 py-2">Weight</th>
            <th class="px-4 py-2">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($graphWeights as $graphWeight)
            <tr>
                <td class="border px-4 py-2">{{ $graphWeight->id }}</td>
                <td class="border px-4 py-2">{{ $graphWeight->start }}</td>
                <td class="border px-4 py-2">{{ $graphWeight->destination }}</td>
                <td class="border px-4 py-2">{{ $graphWeight->weight }}</td>

                <td class="border px-4 py-2">
                    <a href="{{ route('graphWeights.edit',[$graphWeight]) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('graphWeights.destroy',$graphWeight->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $graphWeights->links() !!}
</div> --}}

<div class="container mt-4 mb-6">
    <div class="row mb-4">
      <div class="col-md-6">
        <input type="text" class="form-control form-control-sm" wire:model.live.debounce.300ms="search" placeholder="Search weights...">
      </div>
      <div class="col-md-2">
        <select class="form-control form-control-sm" wire:model.live="orderBy">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          <option value="id">ID</option>
          <option value="start">Start</option>
          <option value="destination">Destination</option>
          <option value="weight">weight</option>
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
          <th scope="col">Start</th>
          <th scope="col">Destination</th>
          <th scope="col">Weight</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($graphWeights as $graphWeight)
        <tr>
          <td>{{ $graphWeight->id }}</td>
          <td>{{ $graphWeight->start }}</td>
          <td>{{ $graphWeight->destination }}</td>
          <td>{{ $graphWeight->weight }}</td>
          <td>
            <a href="{{ route('graphWeights.edit',[$graphWeight]) }}" class="btn btn-success btn-sm">Edit</a>
          </td>
          <td>
            <form action="{{ route('graphWeights.destroy',$graphWeight->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div>
        {!! $graphWeights->links() !!}
    </div>

  </div>
