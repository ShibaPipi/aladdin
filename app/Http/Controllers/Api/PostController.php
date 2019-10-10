<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\PostRequest;
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
        return $this->resource(PostResource::collection(Post::withcount(['comments', 'likes'])->paginate(config('app.page_size'))));
    }

    /**
     * 返回单一文章信息
     *
     * @param Post $post
     * @return mixed
     */
    public function show(Post $post)
    {
        return $this->success(new PostResource($post->load('comments')));
    }

    public function store(PostRequest $request)
    {
        Post::updateOrCreate(['id' => $request->id], $request->all());

        return $this->setStatusCode(201)->success('操作成功');
    }
}
