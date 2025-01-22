<?php

namespace App\Http\Controllers;

use App\Repository\GameRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GameController
{
    public function __construct(
        private GameRepository $repository,
        private Factory $factory
    ) {}

    public function getGames(): View
    {
        return view('games.list', [
            'games' => $this->repository->getAll()
        ]);
    }

    public function create(): View
    {
        return $this->factory->make('games.create');
    }
}
