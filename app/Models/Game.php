<?php

namespace App\Models;

use App\Enum\Date;
use DateTime;
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
     * @return int
     */
    public function getId(): int
    {
        return $this->{self::ID};
    }

    /**
     * @return DateTime
     */
    public function getPlayedAt(): DateTime
    {
        return $this->{self::CREATED_AT};
    }

    /**
     * @return string
     */
    public function getFormattedPlayedAt(bool $showFullDate = false): string
    {
        $playedAt = $this->getPlayedAt();
        $dateFormat = $showFullDate ? Date::HUMAN_TIME_FULL : Date::HUMAN_TIME_SHORT;
        return $playedAt->format($dateFormat);
    }

    /**
     * @return HasOne<Member>
     */
    public function winner(): HasOne
    {
        return $this->hasOne(Member::class, Member::ID, self::WINNER_ID);
    }

    /**
     * @return Member|null
     */
    public function getWinner(): ?Member
    {
        return $this->winner()->get()->first() ?? null;
    }

    /**
     * @param string $winnerId
     * @return Game
     */
    public function setWinner(string $winnerId): Game
    {
        $this->{self::WINNER_ID} = $winnerId;
        return $this;
    }

    /**
     * @return HasMany<Score>
     */
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, Score::GAME_ID, self::ID);
    }

    /**
     * @return Collection<Score>
     */
    public function getScores(): Collection
    {
        return $this->scores()->orderBy(Score::SCORE,'desc')->get();
    }
}
