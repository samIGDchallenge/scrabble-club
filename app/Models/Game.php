<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Collection\Collection;

class Game extends Model
{
    use HasApiTokens, Notifiable;

    public const ID = 'id';
    public const TIME = 'time';

    protected $fillable = [
    ];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->{self::ID};
    }

    /**
     * @return Collection
     */
    public function getParticipants(): Collection
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
}
