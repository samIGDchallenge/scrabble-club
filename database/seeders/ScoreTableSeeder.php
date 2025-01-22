<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;

class ScoreTableSeeder extends Seeder
{
    public function __construct(){

    }

    public function run(): void
    {
        $this->addScore(234, 1,1);
        $this->addScore(345, 1,2);
        $this->addScore(455, 1,4);
        $this->addScore(233, 2,1);
        $this->addScore(135, 2,2);
        $this->addScore(555, 2,3);
        $this->addScore(230, 2,4);
        $this->addScore(341, 3,1);
        $this->addScore(442, 3,2);
        $this->addScore(232, 3,3);
        $this->addScore(345, 3,4);
        $this->addScore(234, 3,5);
    }

    private function addScore(
        string $score,
        string $gameId,
        string $memberId
    ): Score
    {
        return Score::create([
            Score::SCORE => $score,
            Score::GAME_ID => $gameId,
            Score::MEMBER_ID => $memberId
        ]);
    }
}
