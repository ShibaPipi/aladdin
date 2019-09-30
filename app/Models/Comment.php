<?php

namespace App\Models;

class Comment extends Model
{
    protected $hidden = [
        'post_id'
    ];

    /**
     * 获取此评论所属文章
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    /**
     * 获取此评论所属用户
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
