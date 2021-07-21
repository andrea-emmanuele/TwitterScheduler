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
        ])->with('user')->get();

        return response()->json($tweets);
    }
}
