<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    public function __construct(){

    }

//a system to view members' scores.contact details.
//● The date the member joined
//● The members average score
//● Highest score (when and which game)
//● Recent games
    public function run(): void
    {
        $this->addMember('Fred Bloggs', 'scrabble.king123@gmail.com', '07123456789');
        $this->addMember('Jane Doe', 'thehumandictionary@yahoo.co.uk', '01345123456');
        $this->addMember('John Smith', 'wordsmith_john@hotmail.com', '07999555666');
        $this->addMember('Joe Public', 'spell.caster@aol.com', '07789112233');
    }

    private function addMember(string $name, string $email, string $phone): Member
    {
        $user = Member::where(Member::EMAIL, $email)->first();
        if (!$user) {
            $user = Member::create([
                Member::NAME => $name,
                Member::EMAIL => $email,
                Member::PHONE => $phone
            ]);
        }
        return $user;
    }
}
