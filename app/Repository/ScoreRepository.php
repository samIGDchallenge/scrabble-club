<?php

namespace App\Repository;

use App\Models\Score;
use Illuminate\Support\Collection;

class ScoreRepository
{
    public function __construct(
        private Score $model
    )
    {}

    public function create(int $score, string $gameId, string $memberId): Score
    {
        return $this->model->newModelQuery()->create([
            Score::SCORE => $score,
            Score::GAME_ID => $gameId,
            Score::MEMBER_ID => $memberId
        ]);
    }

    public function generateGameScores(Collection $players, string $gameId): Collection
    {
        $scores = new Collection();

        // Generate random score between 100 and 500 for each player
        foreach ($players as $player) {
            $scores->push(
                $this->create(
                    rand(100, 500),
                    $gameId,
                    $player->getId()
                )
            );
        }
        return $scores;
    }
}
