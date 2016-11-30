<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户模型
 */
class Members extends Model
{
    //表名
    protected $table = 'members';
    //关闭时间戳
    public $timestamps = false;

}
