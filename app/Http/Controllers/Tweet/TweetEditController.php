<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TweetEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id) : View
    {
        $tweet = Tweet::find($id);

        // Condition User cannot Edit Another User Tweet 

        // Cara 1
        // if ($tweet->user_id != Auth::id()) {
        //     abort(401);
        // }

        // Cara 2
        $this->authorize('update', $tweet);

        return view('tweets.edit', [
            'tweet' => $tweet
        ]);
    }
}