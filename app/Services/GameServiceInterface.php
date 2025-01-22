<?php

namespace App\Services;

use App\Models\Game;

interface GameServiceInterface
{
    public function playGame(): Game;
}
