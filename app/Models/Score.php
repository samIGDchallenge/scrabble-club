<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    public const ID = 'id';
    public const GAME_ID = 'gameId';
    public const MEMBER_ID = 'memberId';

    protected $fillable = [
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
     * @return BelongsTo<Game>
     */
    public function getGame(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'gameId');
    }

    /**
     * @return BelongsTo<Member>
     */
    public function getMember(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'memberId');
    }
}
