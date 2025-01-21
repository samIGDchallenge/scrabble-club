<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMemberRequest extends FormRequest
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const JOIN_DATE = 'joinDate';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => 'required|string|min:5|max:100',
            self::EMAIL => 'required|string|min:5|max:100',
            self::PHONE => 'required|string|min:5|max:100',
            self::JOIN_DATE => 'required|string|min:5|max:100'
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPhone(): string
    {
        return $this->get(self::PHONE);
    }

    public function getJoinDate(): string
    {
        return $this->get(self::JOIN_DATE);
    }
}
