<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GraphWeight;

class GraphWeightsTable extends Component
{

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function render()
    {
        return view('livewire.graph-weights-table',[
            'graphWeights' => GraphWeight::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }
}
