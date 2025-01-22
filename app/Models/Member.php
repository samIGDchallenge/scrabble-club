<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasApiTokens, Notifiable;

    public const ID = 'id';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const JOIN_DATE = 'joinDate';
    public const AVG_SCORE = 'avgScore';
    public const RECENT_FORM = 'recentForm';
    public const HIGH_SCORE = 'highScore';
    public const HIGH_SCORE_ID = 'highScoreId';

    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PHONE,
        self::JOIN_DATE,
        self::AVG_SCORE,
        self::RECENT_FORM,
        self::HIGH_SCORE,
        self::HIGH_SCORE_ID
    ];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->{self::ID};
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->{self::NAME};
    }

    /**
     * @param string $name
     * @return Member
     */
    public function setName(string $name): Member
    {
        $this->{self::NAME} = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->{self::EMAIL};
    }

    /**
     * @param string $email
     * @return Member
     */
    public function setEmail(string $email): Member
    {
        $this->{self::EMAIL} = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->{self::PHONE};
    }

    /**
     * @param string $phone
     * @return Member
     */
    public function setPhone(string $phone): Member
    {
        $this->{self::PHONE} = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getJoinDate(): string
    {
        return $this->{self::JOIN_DATE};
    }

    /**
     * @param string $joinDate
     * @return Member
     */
    public function setJoinDate(string $joinDate): Member
    {
        $this->{self::JOIN_DATE} = $joinDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getAvgScore(): int
    {
        return $this->{self::AVG_SCORE};
    }

    /**
     * @param int $avgScore
     * @return Member
     */
    public function setAvgScore(int $avgScore): Member
    {
        $this->{self::AVG_SCORE} = $avgScore;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecentForm(): string
    {
        return $this->{self::RECENT_FORM};
    }

    /**
     * @param string $recentForm
     * @return Member
     */
    public function setRecentForm(string $recentForm): Member
    {
        $this->{self::RECENT_FORM} = $recentForm;
        return $this;
    }

    /**
     * @return HasMany<Score>
     */
    public function allScores(): HasMany
    {
        return $this->hasMany(Score::class, Score::MEMBER_ID, self::ID);
    }

    /**
     * @return HasOne<Score>|null
     */
    public function highScore(): ?HasOne
    {
        return $this->hasOne(Score::class, Score::ID, self::HIGH_SCORE_ID);
    }

    /**
     * @return int
     */
    public function getHighScore(): int
    {
        return $this->{self::HIGH_SCORE};
    }

    /**
     * @param Score $score
     * @return Member
     */
    public function setHighScore(Score $score): Member
    {
        $this->{self::HIGH_SCORE} = $score->getScore();
        $this->{self::HIGH_SCORE_ID} = $score->getId();

        return $this;
    }

    public function handleNewScore(Score $score): void
    {
        if ($score->getScore() > $this->getHighScore()) {
            $this->setHighScore($score);
        }
        $newAvgScore = $this->allScores()->avg('score');
        $this->setAvgScore($newAvgScore);
    }
}
