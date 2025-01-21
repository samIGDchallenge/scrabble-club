<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveMemberRequest extends FormRequest
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            self::NAME => 'required|string|min:5|max:100',
            self::EMAIL => 'required|string|min:5|max:100',
            self::PHONE => 'required|string|min:5|max:100'
        ];
    }
}
