<?php

namespace App\Http\Resources\Api;

use App\Models\Enum\PostEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $this->user_id,
            'status' => PostEnum::getStatusName($this->status),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'comments_count' => $this->comments_count,
            'likes_count' => $this->likes_count,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at
        ];
    }
}
