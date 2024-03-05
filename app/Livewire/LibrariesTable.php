<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Library;

class LibrariesTable extends Component
{

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function render()
    {
        return view('livewire.libraries-table',[
            'libraries' => Library::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }
}
