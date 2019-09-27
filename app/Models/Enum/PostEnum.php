<?php

namespace App\Models\Enum;

class PostEnum
{
    // 状态类别
    const DELETED = -1; //已删除
    const NORMAL = 0; //未知
    const FREEZE = 1; //通过

    public static function getStatusName($status)
    {
        switch ($status) {
            case self::DELETED:
                return '已删除';
            case self::NORMAL:
                return '未知';
            case self::FREEZE:
                return '通过';
            default:
                return '通过';
        }
    }
}
