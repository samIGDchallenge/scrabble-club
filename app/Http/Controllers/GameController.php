<?php

namespace App\Http\Controllers;

use App\Repository\GameRepository;
use App\Services\GameServiceInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GameController
{
    public function __construct(
        private GameRepository $repository,
        private Factory $factory,
        private GameServiceInterface $gameService
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

    public function playGame(): RedirectResponse
    {
        $game = $this->gameService->playGame();

        return new RedirectResponse(
            route('games.result', ['gameId' => $game->getId()])
        );
    }

    public function getResult(string $gameId): View
    {
        $game = $this->repository->getGame($gameId);
        return view('games.result', [
            'game' => $game
        ]);
    }
}
