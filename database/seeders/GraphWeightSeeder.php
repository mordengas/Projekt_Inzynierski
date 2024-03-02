<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GraphWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grahpWeights = [
            [
                'start' => 'Fighting',
                'destination' => 'Shooter',
                'weight' => 3
            ],
            [
                'start' => 'Fighting',
                'destination' => 'Platform',
                'weight' => 4
            ],
            [
                'start' => 'Fighting',
                'destination' => 'Role-playing (RPG)',
                'weight' => 4
            ],
            [
                'start' => 'Fighting',
                'destination' => 'Arcade',
                'weight' => 6
            ],

            [
                'start' => 'Shooter',
                'destination' => 'Platform',
                'weight' => 3
            ],
            [
                'start' => 'Shooter',
                'destination' => 'Role-playing (RPG)',
                'weight' => 3
            ],
            [
                'start' => 'Shooter',
                'destination' => 'Real Time Strategy (RTS)',
                'weight' => 3
            ],

            [
                'start' => 'Music',
                'destination' => 'Puzzle',
                'weight' => 4
            ],
            [
                'start' => 'Music',
                'destination' => 'Sport',
                'weight' => 3
            ],

            [
                'start' => 'Platform',
                'destination' => 'Adventure',
                'weight' => 6
            ],
            [
                'start' => 'Platform',
                'destination' => 'Role-playing (RPG)',
                'weight' => 3
            ],

            [
                'start' => 'Puzzle',
                'destination' => 'Pinball',
                'weight' => 5
            ],
            [
                'start' => 'Puzzle',
                'destination' => 'Adventure',
                'weight' => 6
            ],

            [
                'start' => 'Racing',
                'destination' => 'Simulator',
                'weight' => 6
            ],
            [
                'start' => 'Racing',
                'destination' => 'Sport',
                'weight' => 8
            ],

            [
                'start' => 'Real Time Strategy (RTS)',
                'destination' => 'Strategy',
                'weight' => 9
            ],
            [
                'start' => 'Real Time Strategy (RTS)',
                'destination' => 'Turn-based strategy (TBS)',
                'weight' => 9
            ],
            [
                'start' => 'Real Time Strategy (RTS)',
                'destination' => 'Tactical',
                'weight' => 9
            ],

            [
                'start' => 'Role-playing (RPG)',
                'destination' => 'Adventure',
                'weight' => 7
            ],
            [
                'start' => 'Role-playing (RPG)',
                'destination' => 'Turn-based strategy (TBS)',
                'weight' => 4
            ],
            [
                'start' => 'Role-playing (RPG)',
                'destination' => "Hack and slash/Beat 'em up",
                'weight' => 6
            ],
            [
                'start' => 'Role-playing (RPG)',
                'destination' => 'Point-and-click',
                'weight' => 5
            ],
            [
                'start' => 'Role-playing (RPG)',
                'destination' => 'Indie',
                'weight' => 8
            ],

            [
                'start' => 'Simulator',
                'destination' => 'Racing',
                'weight' => 6
            ],
            [
                'start' => 'Simulator',
                'destination' => 'Strategy',
                'weight' => 6
            ],
            [
                'start' => 'Simulator',
                'destination' => 'Sport',
                'weight' => 8
            ],

            [
                'start' => 'Sport',
                'destination' => 'Racing',
                'weight' => 8
            ],
            [
                'start' => 'Sport',
                'destination' => 'Simulator',
                'weight' => 8
            ],

            [
                'start' => "Hack and slash/Beat 'em up",
                'destination' => 'Arcade',
                'weight' => 8
            ],
            [
                'start' => "Hack and slash/Beat 'em up",
                'destination' => 'Role-playing (RPG)',
                'weight' => 6
            ],
            [
                'start' => "Hack and slash/Beat 'em up",
                'destination' => 'Adventure',
                'weight' => 3
            ],

            [
                'start' => 'Pinball',
                'destination' => 'Arcade',
                'weight' => 9
            ],
            [
                'start' => 'Pinball',
                'destination' => 'Simulator',
                'weight' => 6
            ],

            [
                'start' => 'Adventure',
                'destination' => 'Puzzle',
                'weight' => 7
            ],
            [
                'start' => 'Adventure',
                'destination' => 'Point-and-click',
                'weight' => 9
            ],
            [
                'start' => 'Adventure',
                'destination' => 'Role-playing (RPG)',
                'weight' => 6
            ],

            [
                'start' => 'Arcade',
                'destination' => 'Platform',
                'weight' => 8
            ],
            [
                'start' => 'Arcade',
                'destination' => 'Shooter',
                'weight' => 8
            ],
            [
                'start' => 'Arcade',
                'destination' => 'Puzzle',
                'weight' => 6
            ],
            [
                'start' => 'Arcade',
                'destination' => 'Racing',
                'weight' => 6
            ],
            [
                'start' => 'Arcade',
                'destination' => 'Sport',
                'weight' => 6
            ],
            [
                'start' => 'Arcade',
                'destination' => 'Fighting',
                'weight' => 5
            ],
            [
                'start' => 'Arcade',
                'destination' => 'Adventure',
                'weight' => 3
            ],

            [
                'start' => 'Visual Novel',
                'destination' => 'Adventure',
                'weight' => 8
            ],
            [
                'start' => 'Visual Novel',
                'destination' => 'Point-and-click',
                'weight' => 8
            ],
            [
                'start' => 'Visual Novel',
                'destination' => 'Role-playing (RPG)',
                'weight' => 6
            ],
            [
                'start' => 'Visual Novel',
                'destination' => 'Simulator',
                'weight' => 6
            ],
            [
                'start' => 'MOBA',
                'destination' => 'Real Time Strategy (RTS)',
                'weight' => 8
            ],
            [
                'start' => 'MOBA',
                'destination' => 'Role-playing (RPG)',
                'weight' => 6
            ],
            [
                'start' => 'Indie',
                'destination' => 'Adventure',
                'weight' => 8
            ],
            [
                'start' => 'Indie',
                'destination' => 'Platform',
                'weight' => 6
            ],
            [
                'start' => 'Indie',
                'destination' => 'Puzzle',
                'weight' => 6
            ],
            [
                'start' => 'Point-and-click',
                'destination' => 'Adventure',
                'weight' => 9
            ],
            [
                'start' => 'Point-and-click',
                'destination' => 'Puzzle',
                'weight' => 8
            ],
            [
                'start' => 'Point-and-click',
                'destination' => 'Role-playing (RPG)',
                'weight' => 5
            ],
            [
                'start' => 'Quiz/Trivia',
                'destination' => 'Puzzle',
                'weight' => 8
            ],
            [
                'start' => 'Card & Board Game',
                'destination' => 'Strategy',
                'weight' => 8
            ],
            [
                'start' => 'Card & Board Game',
                'destination' => 'Role-playing (RPG)',
                'weight' => 6
            ],
            [
                'start' => 'Card & Board Game',
                'destination' => 'Puzzle',
                'weight' => 7
            ]
        ];

        foreach ($grahpWeights as $grahpWeight) {
            DB::table('graph_weights')->insert($grahpWeight);
        }
    }
}
