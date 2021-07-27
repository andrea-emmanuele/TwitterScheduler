<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function checkLength(Request $request)
    {
        $n = Tweet::where([
            ['user_id', $request->user],
            ['published_at', '<', now()]
        ])->count();

        return response()->json($n);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'max:320',
            'mediaPath' => 'mimes:jpeg,jpg,png,gif|max:8000',
            'publishedAt' => '',
            'userId' => 'required',
        ]);

        $tweet = new Tweet();
        $tweet->message = $request->message;

        if ($request->mediaPath) {

            $path = $request->file('mediaPath')->getClientOriginalName() . "_" . time() . "." . $request->file('mediaPath')->getClientOriginalExtension();
            $store = $request->file('mediaPath')->storeAs('public/' . $request->userId, $path, 's3');

            Storage::disk('s3')->setVisibility($store, 'public');

            $tweet->media_path = Storage::disk('s3')->url($store);
        }

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
