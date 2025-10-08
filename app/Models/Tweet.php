<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Tweet extends Model
{
    /** @use HasFactory<\Database\Factories\TweetFactory> */
    use HasFactory;

    protected $fillable = ['tweet'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔽 いいね機能（中間テーブル名を明示）
    public function liked()
    {
        return $this->belongsToMany(User::class, 'tweet_user')->withTimestamps();
    }

    // 🔽 いいね済み判定
    public function isLikedBy(User $user): bool
    {
        return $this->liked()->where('user_id', $user->id)->exists();
    }

    // 🔽 コメント機能
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
