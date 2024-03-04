<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\GraphWeight;

class ShowGraphModal extends Component
{
    public function render()
    {
        $genres = [
            'Fighting',
            'Shooter',
            'Music',
            'Platform',
            'Puzzle',
            'Racing',
            'Real Time Strategy (RTS)',
            'Role-playing (RPG)',
            'Simulator',
            'Sport',
            'Strategy',
            'Turn-based strategy (TBS)',
            'Tactical',
            'Quiz/Trivia',
            "Hack and slash/Beat 'em up",
            'Pinball',
            'Adventure',
            'Arcade',
            'Visual Novel',
            'Indie',
            'Card & Board Game',
            'MOBA',
            'Point-and-click',
          ];
        $edges = GraphWeight::all();

        return view('livewire.show-graph-modal')->with('edges', $edges)->with('genres', $genres);
    }
}
