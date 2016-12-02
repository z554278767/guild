<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 惩戒模型
 */
class Punish extends Model
{
    //主键
    protected $primaryKey = 'j_id';
    //表名
    protected $table = 'judgments';
}