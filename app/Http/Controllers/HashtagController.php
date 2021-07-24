<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    public function index(Request $request)
    {
        $hashtags = Hashtag::where('name', 'like', $request->name . '%')->get();

        if (!count($hashtags)) {
            return response()->json([], 404);
        }

        return response()->json($hashtags);
    }
}
