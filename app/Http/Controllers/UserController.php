<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('tag', 'like', $request->tag . '%')->get();

        if (!count($users)) {
            return response()->json([], 404);
        }

        return response()->json($users);
    }
}
