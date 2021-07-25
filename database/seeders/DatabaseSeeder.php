<?php

namespace Database\Seeders;

use App\Models\Hashtag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Andrea E.';
        $user->tag = 'andrea#001';
        $user->email = 'hello@andreaemmanuele.it';
        $user->password = '$2y$10$q9vxJ/ZszMZtSBb.WFV97OBNWfhDT8AKiM1nIexgvI6r6n4AvtYQ2';
        $user->remember_token = Str::random(10);
        $user->save();

        \App\Models\User::factory(10)->create();
        \App\Models\Tweet::factory(20)->create();

        $hashtags = config('hashtags');

        foreach ($hashtags as $hashtag) {
            $newHashtag = new Hashtag();
            $newHashtag->name = $hashtag;
            $newHashtag->save();
        }
    }
}
