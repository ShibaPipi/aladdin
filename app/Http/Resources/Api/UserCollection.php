<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * @var array
     */
    protected $withoutFields = [];

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->processCollection($request);
    }

    public function hide(array $fields)
    {
        $this->withoutFields = $fields;

        return $this;
    }

    /**
     * Send fields to hide to UsersResource while processing the collection.
     * 将隐藏字段通过 UsersResource 处理集合
     *
     * @param $request
     * @return array
     */
    protected function processCollection($request)
    {
        return $this->collection->map(function (UserResource $resource) use ($request) {
            return $resource->hide($this->withoutFields)->toArray($request);
        })->all();
    }
}
