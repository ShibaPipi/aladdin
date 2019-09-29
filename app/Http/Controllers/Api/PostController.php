<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * 返回文章列表
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        return $this->resource(PostResource::collection(Post::paginate(3)));
    }

    /**
     * 返回单一文章信息
     *
     * @param Post $post
     * @return mixed
     */
    public function show(Post $post)
    {
        return $this->success(new PostResource($post->comments));
    }
}
