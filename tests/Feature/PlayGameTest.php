<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\Member;
use App\Models\Score;
use App\Repository\GameRepository;
use App\Repository\MemberRepository;
use App\Repository\ScoreRepository;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PlayGameTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlayGame(): void
    {
        $memberRepository = $this->mock(MemberRepository::class);
        $gameRepository = $this->mock(GameRepository::class);
        $scoreRepository = $this->mock(ScoreRepository::class);

        $members = Member::factory()->count(10)->make();

        $memberRepository
            ->shouldReceive('getNumberOfMembers')
            ->once()
            ->andReturn($members->count());

        $memberRepository
            ->shouldReceive('getRandomMembers')
            ->once()
            ->andReturn($members->take(3));

        $game = $this->createMock(Game::class);
        $game->method('getId')->willReturn(1);

        $gameRepository
            ->shouldReceive('create')
            ->once()
            ->andReturn($game);

        $scores = $this->createMock(Collection::class);

        $scoreRepository
            ->shouldReceive('generateGameScores')
            ->once()
            ->andReturn($scores);

        $winner = $this->createMock(Score::class);
        $member = $this->createMock(Member::class);

        $scores->expects($this->once())
            ->method('sortByDesc')
            ->with(Score::SCORE)
            ->willReturn($scores);

        $scores->expects($this->once())
            ->method('first')
            ->willReturn($winner);

        $winner->expects($this->once())
            ->method('getMember')
            ->willReturn($member);

        $game->expects($this->once())
            ->method('setWinner')
            ->with(
                $member->id
            );

        $game->expects($this->once())
            ->method('save')
            ->willReturnSelf();

        $dispatcher = $this->mock(Dispatcher::class);
        $dispatcher
            ->shouldReceive('dispatch')
            ->once();

        $response = $this->post(route('games.play'));

        $response->assertRedirect(route('games.result', ['gameId' => (string)($game->getId())]));
    }
}
