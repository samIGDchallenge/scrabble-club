<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Services\GameServiceInterface;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private GameServiceInterface $gameService
    ) {}

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var $members Collection<Member>
         */
        Member::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            $this->gameService->playGame();
        }
    }
}
