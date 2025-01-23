<?php

namespace App\Repository;

use App\Models\Member;
use DateTime;
use Illuminate\Support\Collection;
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

    public function getNumberOfMembers(): int
    {
        return $this->model->newModelQuery()->count();
    }

    public function getRandomMembers(int $number): Collection
    {
        $randomIds = $this->model->newModelQuery()
            ->select('id')
            ->inRandomOrder()
            ->limit($number)
            ->pluck('id');

        return $this->model->newModelQuery()
            ->whereIn('id', $randomIds)
            ->get();
    }

    public function getTopTen(): Collection
    {
        return $this->model->newModelQuery()
            ->orderBy(Member::AVG_SCORE, 'desc')
            ->limit(10)
            ->get();
    }

    public function getMember(string $memberId): Member
    {
        return $this->model->newModelQuery()->find($memberId);
    }

    public function create(string $name, string $email, string $phone, DateTime $joinDate): Member
    {
        return $this->model->newModelQuery()->create([
            Member::NAME => $name,
            Member::EMAIL => $email,
            Member::PHONE => $phone,
            Member::JOIN_DATE => $joinDate,
            Member::HIGH_SCORE_ID => 0
        ]);
    }

    public function delete(string $memberId): bool
    {
        $member = $this->getMember($memberId);

        return $member->delete();
    }
}
