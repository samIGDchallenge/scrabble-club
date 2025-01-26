<?php

namespace App\Services;

use App\Events\GameFinishedEvent;
use App\Models\Game;
use App\Models\Member;
use App\Models\Score;
use App\Repository\GameRepository;
use App\Repository\MemberRepository;
use App\Repository\ScoreRepository;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Collection;

class GameService implements GameServiceInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private MemberRepository $memberRepository,
        private GameRepository $gameRepository,
        private ScoreRepository $scoreRepository
    ) {}

    public function playGame(): Game
    {
        // Games must have between 2–4 players
        $lowerLimit = 2;
        $upperLimit = min(4,$this->memberRepository->getNumberOfMembers());
        $numberOfPlayers = rand($lowerLimit,$upperLimit);

        $players = $this->memberRepository->getRandomMembers($numberOfPlayers);

        $game = $this->gameRepository->create();

        $scores = $this->scoreRepository->generateGameScores(
            $players,
            $game->getId()
        );

        $winner = $scores->sortByDesc(Score::SCORE)->first();
        $game->setWinner($winner->getMember()->getId());
        $game->save();

        $this->dispatcher->dispatch(new GameFinishedEvent($game));

        return $game;
    }
}
