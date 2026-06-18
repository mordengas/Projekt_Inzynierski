<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GraphWeight;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(GraphWeightSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'testUser',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
            'role' => 'admin'
        ]);
    }
}
