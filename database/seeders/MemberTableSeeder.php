<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class MemberTableSeeder extends Seeder
{
    public function __construct(){

    }

    public function run(): void
    {
        $this->addMember('Fred Bloggs', 'scrabble.king123@gmail.com', '07123456789','2025-01-21 13:45:23');
        $this->addMember('Jane Doe', 'thehumandictionary@yahoo.co.uk', '01345123456','2025-01-11 11:23:12');
        $this->addMember('John Smith', 'wordsmith_john@hotmail.com', '07999555666','2024-12-23 15:42:23');
        $this->addMember('Joe Public', 'spell.caster@aol.com', '07789112233','2024-12-23 15:42:23');
    }

    private function addMember(
        string $name,
        string $email,
        string $phone,
        string $joinDate
    ): Member
    {
        $user = Member::where(Member::EMAIL, $email)->first();
        if (!$user) {
            $user = Member::create([
                Member::NAME => $name,
                Member::EMAIL => $email,
                Member::PHONE => $phone,
                Member::JOIN_DATE => $joinDate,
                Member::AVG_SCORE => 0,
                Member::RECENT_FORM => '-----'
            ]);
        }
        return $user;
    }
}
