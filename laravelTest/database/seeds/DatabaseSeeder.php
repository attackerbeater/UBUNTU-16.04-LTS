<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Leveranciers::class, 10)->create();
        factory(App\User::class, 25)->create();
        factory(App\Ticket::class, 500)->create();
        factory(App\Point::class, 2000)->create();

        // factory(App\User::class, 5)->create();
        factory(App\Poll::class, 10)->create();
        factory(App\Question::class, 50)->create();
        factory(App\Answer::class, 500)->create();
    }
}
