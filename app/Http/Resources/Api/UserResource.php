<?php

namespace App\Http\Resources\Api;

use App\Models\Enum\UserEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @var array
     */
    protected $withoutFields = [];

    public static function collection($resource)
    {
        return tap(new UserCollection($resource), function ($collection) {
            $collection->collects = __CLASS__;
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'name' => $this->name,
            'status' => UserEnum::getStatusName($this->status),
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at
        ]);
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
