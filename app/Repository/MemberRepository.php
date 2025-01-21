<?php

namespace App\Repository;

use App\Models\Member;
use Illuminate\Support\LazyCollection;

class MemberRepository
{
    public function __construct(
        private Member $model
    )
    {}

    public function getAll(): LazyCollection
    {
        return $this->model->newModelQuery()
            ->cursor();
    }

    public function getMember(string $memberId): Member
    {
        return $this->model->newModelQuery()->find($memberId);
    }
}
