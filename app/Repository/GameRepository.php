<?php

namespace App\Repository;

use App\Models\Game;
use Illuminate\Support\LazyCollection;

class GameRepository
{
    public function __construct(
        private Game $model
    )
    {}

    public function getAll(): LazyCollection
    {
        return $this->model->newModelQuery()
            ->orderBy(Game::ID, 'desc')
            ->cursor();
    }

    public function getGame(string $gameId): Game
    {
        return $this->model->newModelQuery()->find($gameId);
    }
}
