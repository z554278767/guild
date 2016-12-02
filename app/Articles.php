<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 动态模型
 */
class Articles extends Model
{
    //主键
    protected $primaryKey = 'a_id';
    //表名
    protected $table = 'articles';
}