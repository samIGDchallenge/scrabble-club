<?php

namespace App\Services;

use App\Events\GameFinishedEvent;
use App\Models\Game;
use App\Models\Score;
use App\Repository\MemberRepository;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Collection;

class GameService implements GameServiceInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private MemberRepository $repository
    ) {}

    public function playGame(): Game
    {
        // Games must have between 2–4 players
        $lowerLimit = 2;
        $upperLimit = min(4,$this->repository->getNumberOfMembers());
        $numberOfPlayers = rand($lowerLimit,$upperLimit);

        $players = $this->repository->getRandomMembers($numberOfPlayers);

        $game = Game::create([
            Game::WINNER_ID => 0
        ]);
        $scores = new Collection();

        foreach ($players as $player) {
            // Generate random score between 100 and 500 for each player
            $score = rand(100,500);

            $scores->push(
                Score::create([
                    Score::SCORE => $score,
                    Score::GAME_ID => $game->getId(),
                    Score::MEMBER_ID => $player->getId(),
                ])
            );
        }
        $winner = $scores->sortByDesc(Score::SCORE)->first();
        $game->setWinner($winner->getMember()->getId());
        $game->save();

        $this->dispatcher->dispatch(new GameFinishedEvent($game));

        return $game;
    }
}
