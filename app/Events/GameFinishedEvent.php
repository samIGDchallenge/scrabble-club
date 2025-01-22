<?php

namespace App\Events;

use App\Models\Game;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GameFinishedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(private Game $game)
    {}

    public function getGame(): Game
    {
        return $this->game;
    }
}
