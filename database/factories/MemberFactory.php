<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Member::NAME => fake()->firstName() . ' ' . fake()->firstName(),
            Member::EMAIL => fake()->unique()->safeEmail(),
            Member::PHONE => fake()->unique()->regexify('07[0-9]{9}'),
            Member::JOIN_DATE => fake()->dateTimeBetween('-2 years', 'now'),
            Member::AVG_SCORE => 0,
            Member::RECENT_FORM => '-----',
            Member::HIGH_SCORE => 0,
            Member::HIGH_SCORE_ID => 0
        ];
    }
}
