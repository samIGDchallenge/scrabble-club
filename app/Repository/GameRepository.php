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
            ->cursor();
    }
//
//    public function getGame(string $gameId): Member
//    {
//        return $this->model->newModelQuery()->find($gameId);
//    }
//
//    public function create(string $name, string $email, string $phone, string $joinDate): Member
//    {
//        return $this->model->newModelQuery()->create([
//            Member::NAME => $name,
//            Member::EMAIL => $email,
//            Member::PHONE => $phone,
//            Member::JOIN_DATE => $joinDate
//        ]);
//    }
}
