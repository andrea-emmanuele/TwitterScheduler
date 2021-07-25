<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        $tweets = Tweet::where([
            ['user_id', $request->user],
            ['published_at', '<', now()]
        ])->with('user')->orderBy('published_at', 'DESC')->get();

        return response()->json($tweets);
    }

    public function indexScheduled(Request $request)
    {
        $scheduledTweets = Tweet::where([
            ['user_id', $request->user],
            ['published_at', '>', now()]
        ])->with('user')->orderBy('published_at', 'ASC')->get();

        return response()->json($scheduledTweets);
    }

    public function store(Request $request)
    {
        $tweet = new Tweet();
        $tweet->message = $request->message;

        if ($request->publishedAt)
        {
            $tweet->published_at = $request->publishedAt;
        }
        else
        {
            $tweet->published_at = now();
        }

        $tweet->user_id = $request->userId;
        $tweet->save();

        $tweet = Tweet::where('id', $tweet->id)->with('user')->get();

        return response()->json($tweet);
    }
}
