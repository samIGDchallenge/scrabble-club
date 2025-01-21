<?php

namespace App\Repository;

use App\Http\Requests\SaveMemberRequest;
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

    public function create(string $name, string $email, string $phone, string $joinDate): Member
    {
        return $this->model->newModelQuery()->create([
            Member::NAME => $name,
            Member::EMAIL => $email,
            Member::PHONE => $phone,
            Member::JOIN_DATE => $joinDate
        ]);
    }
}
