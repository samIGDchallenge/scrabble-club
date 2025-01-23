<?php

namespace Database\Seeders;

use App\Enum\Date;
use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    public function __construct(){

    }

    public function run(): void
    {
        $this->addMember(
            'Fred Bloggs',
            'scrabble.king123@gmail.com',
            '07123456789',
            \DateTime::createFromFormat(Date::DATE,'2024-05-11'),
            270,
            '--LLL',
            341,
            8
        );
        $this->addMember(
            'Jane Doe',
            'thehumandictionary@yahoo.co.uk',
            '01345123456',
            \DateTime::createFromFormat(Date::DATE,'2024-07-21'),
            319,
            '-LLWW',
            442,
            9
        );
        $this->addMember(
            'John Smith',
            'wordsmith_john@hotmail.com',
            '07999555666',
            \DateTime::createFromFormat(Date::DATE,'2024-12-23'),
            394,
            '---WL',
            555,
            6
        );
        $this->addMember(
            'Joe Public',
            'spell.caster@aol.com',
            '07789112233',
            \DateTime::createFromFormat(Date::DATE,'2024-12-24'),
            283,
            '-WLLL',
            455,
            3
        );
    }

    private function addMember(
        string $name,
        string $email,
        string $phone,
        \DateTime $joinDate,
        int $avgScore,
        string $recentForm,
        int $highScore,
        int $highScoreId
    ): Member
    {
        $user = Member::where(Member::EMAIL, $email)->first();
        if (!$user) {
            $user = Member::create([
                Member::NAME => $name,
                Member::EMAIL => $email,
                Member::PHONE => $phone,
                Member::JOIN_DATE => $joinDate,
                Member::AVG_SCORE => $avgScore,
                Member::RECENT_FORM => $recentForm,
                Member::HIGH_SCORE => $highScore,
                Member::HIGH_SCORE_ID => $highScoreId
            ]);
        }
        return $user;
    }
}
