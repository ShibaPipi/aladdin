<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public $timestamps = true;

    protected $dateFormat = 'U';

    protected $guarded = []; //  不可以注入的字段

}
