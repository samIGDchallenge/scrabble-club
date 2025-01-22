<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    public function __construct(){

    }

    public function run(): void
    {
        $this->addGame(1);
        $this->addGame(2);
        $this->addGame(2);
        $this->addGame(3);
    }

    private function addGame(
        string $winnerId
    ): Game
    {
        return Game::create([
            Game::WINNER_ID => $winnerId
        ]);
    }
}
