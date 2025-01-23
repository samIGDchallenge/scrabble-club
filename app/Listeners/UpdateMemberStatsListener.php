<?php

namespace App\Listeners;

use App\Events\GameFinishedEvent;
use App\Repository\MemberRepository;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateMemberStatsListener implements ShouldQueue
{
    public function __construct(
        private MemberRepository $repository
    ) {}

    public function handle(GameFinishedEvent $event): void
    {
        $game = $event->getGame();
        $scores = $game->getScores();

        foreach ($scores as $score) {
            $member = $this->repository->getMember($score->getMember()->getId());

            // Update high score for member
            if ($score->getScore() > $member->getHighScoreValue()) {
                $member->setHighScore($score);
            }

            // Update average score for member
            $newAvgScore = round($member->scores()->avg('score'));
            $member->setAvgScore($newAvgScore);

            // Update recent form for member
            $latestResult = $game->getWinner()->getId() === $member->getId() ? 'W' : 'L';
            $recentForm = $member->getRecentForm();
            $updatedRecentForm = substr($recentForm, 1) . $latestResult;
            $member->setRecentForm($updatedRecentForm);

            $member->saveQuietly();
        }
    }
}
