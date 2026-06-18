<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MyGame;
use Livewire\WithPagination;

class MyGamesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function render()
    {
        return view('livewire.my-games-table',[
            'games' => MyGame::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }
}
