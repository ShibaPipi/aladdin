<?php

namespace App\Models;

class Post extends Model
{
    /**
     * 获取此文章所属用户
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 获取文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->orderBy('created_at', 'desc')->limit(config('app.page_size'));
    }

    /**
     * 获取文章的评论
     */
    public function likes()
    {
        return $this->hasMany('App\Models\Likes')->orderBy('created_at', 'desc')->limit(config('app.page_size'));
    }
}
