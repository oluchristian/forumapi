<?php

namespace App\Http\Controllers\Feed;

use App\Models\Feed;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class FeedController extends Controller
{
    public function store(PostRequest $request)
    {
        $request->validated();

        auth()->user()->feeds()->create([
            'content' => $request->content,
        ]);
        return response([
            'message' => "success"
        ], 201);
    }

    public function likePost($feedId)
    {
        //select feed with feed_id
        $feed = Feed::whereId($feedId)->first();
        if (!$feed) {
            return response([
                'message' => '404 Not Found',
            ], 500);
        }
    }
}
