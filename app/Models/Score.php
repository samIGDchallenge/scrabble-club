<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    public const ID = 'id';
    public const SCORE = 'score';
    public const GAME_ID = 'gameId';
    public const MEMBER_ID = 'memberId';

    protected $fillable = [
        self::SCORE,
        self::GAME_ID,
        self::MEMBER_ID
    ];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->{self::ID};
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->{self::SCORE};
    }

    /**
     * @return BelongsTo<Game>
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'gameId');
    }

    /**
     * @return BelongsTo<Member>
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'memberId');
    }

    /**
     * @return Member|null
     */
    public function getMember(): ?Member
    {
        return $this->member()->get()->first() ?? null;
    }
}
