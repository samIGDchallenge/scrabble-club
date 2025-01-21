<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasApiTokens, Notifiable;

    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';

    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PHONE,
    ];

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    /**
     * @param string|null $name
     * @return Member
     */
    public function setName(?string $name): Member
    {
        $this->{self::NAME} = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->{self::EMAIL};
    }

    /**
     * @param string|null $email
     * @return Member
     */
    public function setEmail(?string $email): Member
    {
        $this->{self::EMAIL} = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->{self::PHONE};
    }

    /**
     * @param string|null $phone
     * @return Member
     */
    public function setPhone(?string $phone): Member
    {
        $this->{self::PHONE} = $phone;
        return $this;
    }
}
