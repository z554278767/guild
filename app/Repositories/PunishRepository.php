<?php

namespace App\Repositories;

use Hash;
use App\Punish;
use Illuminate\Support\Facades\Input;

class PunishRepository
{
    /**
     * 联合惩戒 列表
     */
    public function Punish_list()
    {
        $re = Punish::all(['j_id','c_name','m_id','j_type','j_info','j_res','j_status'])->toArray();
        if ($re)
        {
           $data['code'] = 10000;
           $data['status'] = 'success';
           $data['content']=$re;
        }
        else
        {
            $data['code'] = 10001;
            $data['status'] = 'false';
            $data['content'] = 'Temporarily no data';
        }
        return response()->json($data)->withCallback(Input::get('callback'));
    }

    /**
     * 惩戒详情
     */
        public function punish_details($id)
        {
            $re = Punish::where('j_id',$id)->first()->toArray();
            if($re)
            {
                $data['code'] = 10000;
                $data['status'] = 'success';
                $data['content'] = $re;
            }
            else
            {
                $data['code'] = 10001;
                $data['status'] = 'false';
                $data['content'] = 'An unknown error';
            }
            return response()->json($data)->withCallback(Input::get('callback'));
        }

        /**
         * 惩戒添加
         */
    public function punish_add($arr)
    {
        $judgments = new Punish;
        $judgments->c_name = $arr['c_name'];  // 缺少会员名称  会员 职位
        $judgments->j_type = $arr['j_type'];
        $judgments->j_info = $arr['j_info'];
        $judgments->j_res = $arr['j_res'];
        $judgments->j_status = $arr['j_status'];
        $judgments->created_at = $arr['created_at'];
        $re = $judgments->save();
        if($re){
            $data['code'] = 10000;
            $data['status'] = 'success';
            $data['content'] = 'Add a success';
        }else{
            $data['code'] = 10001;
            $data['status'] = 'false';
            $data['content'] = 'Add failure';
        }
        return response()->json($data);
    }
}


?>