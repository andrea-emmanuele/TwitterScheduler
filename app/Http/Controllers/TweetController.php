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


        $message = strip_tags($request->message); // Eliminiamo eventuali tag html inseriti dall'utente

        // wrappiamo eventuali URLs in un tag <a href=""></a>
        $message = preg_replace('@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@', '<a href="http$2://$3" target="_blank" class="text-blue hover:opacity-80">$0</a>', $message);
        $message = preg_replace('/(\r\n|\r|\n)/', '<p>${1}</p>', $message); // Aggiungiamo spazi a capo al testo qualora ce ne siano
        $message = preg_replace('/#+([a-zA-Z0-9_]+)/', '<a href="/hashtag/$1" class="text-blue hover:opacity-80">$0</a>', $message); // Generiamo gli hashtags sempre utilizzando regex
        $message = preg_replace('/@+([a-zA-Z0-9_]+)/', '<a href="/$1" class="text-blue hover:opacity-80">$0</a>', $message); // Generiamo dei link se l'utente menziona un altro utente utilizzando la @

        $tweet = new Tweet();
        $tweet->message = $message;

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

    public function destroy(Request $request)
    {
        $tweets = json_decode($request->tweets);

        foreach ($tweets as $id) {
            $tweet = Tweet::where('id', $id)->delete();
        }

        if ($tweet) {
            return response()->json($tweets);
        }
    }
}
