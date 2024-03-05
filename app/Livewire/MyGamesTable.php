<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MyGame;

class MyGamesTable extends Component
{

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
