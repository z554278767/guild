<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Input;
use App\Companys;

/**
 * @var Companys仓库
 * @author Mr.Yuan
 */
class CompanysRepository
{
    /**
     * 审批列表
     */
    public function check_list()
    {
        $re = Companys::all(array('c_id','c_name','created_at','c_contacts','c_phone','c_status'))->toArray();
        if($re){
            $data['code'] = 10000;
            $data['status']='success';
            $data['content'] = $re;
        }else{
            $data['code'] = 10001;
            $data['status']='false';
            $data['content']='Temporarily no data';
        }
        exit(json_encode($data));
    }

    /**
     * 审批详情
     */
    public function details($id)
    {
        $re = Companys::where('c_id',$id)->first()->toArray();
        if($re){
            $data['code'] = 10000;
            $data['status']='success';
            $data['content'] = $re;
        }else{
            $data['code'] = 10001;
            $data['status']='false';
            $data['content']='An unknown error';
        }
        exit(json_encode($data));
    }

    /**
     * 审核
     */
    public function audit($data)
    {
        $re = Companys::where('c_id',$data['c_id'])->update(array('c_status'=>$data['c_status']));
        if($re){
            $arr['code'] = 10000;
            $arr['status'] = 'success';
            $arr['content'] = 'Submitted successfully';
        }else{
            $arr['code'] = 10001;
            $arr['status'] = 'false';
            $arr['content'] = 'Submission failed';
        }
        exit(json_encode($arr));
    }
}
?>