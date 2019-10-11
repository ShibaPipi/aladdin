<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;

class JsonResource extends BaseJsonResource
{
    /**
     * 需要隐藏的字段
     *
     * @var array
     */
    protected $withoutFields = [];

    public static function collection($resource)
    {
        return tap(new UserResourceCollection($resource), function ($collection) {
            $collection->collects = get_called_class();
        });
    }

    /**
     * Set the keys that are supposed to be filtered out.
     * 设置需要隐藏过滤掉的键
     *
     * @param array $fields
     * @return $this
     */
    public function hide(array $fields)
    {
        $this->withoutFields = $fields;

        return $this;
    }

    /**
     * Remove the filtered keys.
     * 删除隐藏的键
     *
     * @param $array
     * @return array
     */
    protected function filterFields(array $array)
    {
        return collect($array)->forget($this->withoutFields)->toArray();
    }
}
