<?php

namespace Database\Seeders;

use App\Models\Hashtag;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
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

        $tweets = Config::get('tweets');

        foreach ($tweets as $tweet) {
            $newTweet = new Tweet();
            $newTweet->message = $tweet['message'];
            $newTweet->media_path = $tweet['media_path'];
            $newTweet->published_at = $tweet['published_at'];
            $newTweet->user_id = $tweet['user_id'];
            $newTweet->save();
        }
    }
}
