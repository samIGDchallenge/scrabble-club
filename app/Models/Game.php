<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class Game extends Model
{
    public const ID = 'id';
    public const WINNER_ID = 'winnerId';

    protected $fillable = [
        self::WINNER_ID
    ];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->{self::ID};
    }

    public function getTime(): Carbon
    {
        return $this->{self::CREATED_AT};
    }

    /**
     * @return HasOne<Member>
     */
    public function winner(): HasOne
    {
        return $this->hasOne(Member::class, Member::ID, self::WINNER_ID);
    }

    /**
     * @return HasMany<Score>
     */
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, Score::GAME_ID, self::ID);
    }
}
