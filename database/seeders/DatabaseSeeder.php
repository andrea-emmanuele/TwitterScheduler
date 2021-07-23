<?php

namespace Database\Seeders;

use App\Models\Hashtag;
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
        \App\Models\User::factory(1)->create();
        \App\Models\Tweet::factory(10)->create();

        $hashtags = config('hashtags');

        foreach ($hashtags as $hashtag) {
            $newHashtag = new Hashtag();
            $newHashtag->name = $hashtag;
            $newHashtag->save();
        }
    }
}
