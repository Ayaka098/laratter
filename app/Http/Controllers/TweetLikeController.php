<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TweetLiked;


class TweetLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Tweet $tweet)
    {       
        
        $user = auth()->user();

        // すでにlikeしているか確認
        if ($tweet->isLikedBy($user)) {
            return back()->with('message', 'すでにLikeしています');
        }

        // いいねを保存
        $tweet->liked()->attach($user->id);

        // 投稿者に通知を送る（Laravel通知システム）
        $tweet->user->notify(new TweetLiked($user->id, $tweet->id));

        return back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(Tweet $tweet)
    {
        $tweet->liked()->detach(auth()->id());
        return back();
    }
}
