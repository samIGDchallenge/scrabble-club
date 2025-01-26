<?php

namespace App\Http\Requests;

use App\Enum\Date;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveMemberRequest extends FormRequest
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const JOIN_DATE = 'joinDate';
    public const MEMBER_ID = 'memberId';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => 'required|string|min:3|max:30',
            self::EMAIL => [
                'required',
                'email',
                Rule::unique('members','email')->ignore($this->getMemberId(),'id')
            ],
            self::PHONE => [
                'required',
                'phone:gb',
                Rule::unique('members','phone')->ignore($this->getMemberId(),'id')
            ],
            self::JOIN_DATE => 'required|string|min:5|max:10'
        ];
    }

    public function messages(): array
    {
        return [
            self::PHONE . '.phone' => 'The phone number must be a valid UK phone number.',
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

    public function getJoinDate(): DateTime
    {
        $joinDateString = $this->get(self::JOIN_DATE);
        return DateTime::createFromFormat(Date::DATE,$joinDateString);
    }

    public function getMemberId(): ?int
    {
        return $this->get(self::MEMBER_ID) ?? null;
    }
}
