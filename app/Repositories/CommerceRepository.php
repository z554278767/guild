<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Input;
use App\Articles;

/**
 * @var Commerce仓库
 * @author Mr.zqp
 */
class CommerceRepository
{
    /**
     * 动态列表
     * @return json
     */
    public function message_list()
    {
        $re = Articles::orderBy('updated_at','asc')->get(array('a_id','a_title','a_author','a_content','a_verifier','verify_date','is_publish'))->toArray();
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
     * 添加信息
     * @param $data array
     * @return json
     */
    public function message_add($arr)
    {
        $res = Articles::where('a_title',$arr['a_title'])->get(array('a_title'))->toArray();
        if($res){
            $data['code'] = 10003;
            $data['status'] = 'false';
            $data['content'] = 'existing';
            exit(json_encode($data));
        }

        $articles = new Articles;
        $articles->a_title = $arr['a_title'];
        $articles->a_author = $arr['a_author'];
        //$articles->created_at = $arr['created_at'];
        $articles->a_content = $arr['a_content'];
        $articles->is_publish = 1;
        $re = $articles->save();
        if($re){
            $data['code'] = 10000;
            $data['status'] = 'success';
            $data['content'] = 'Add a success';
        }else{
            $data['code'] = 10001;
            $data['status'] = 'false';
            $data['content'] = 'Add failure';
        }
        exit(json_encode($data));
    }

    /**
     * 删除信息
     * @param $a_id array 信息ID
     * @param json
     */
    public function message_del($a_id)
    {
        $re = Articles::destroy($a_id);
        if($re){
            $data['code'] = 10000;
            $data['status'] = 'success';
            $data['content'] = 'Delete the success';
        }else{
            $data['code'] = 10001;
            $data['status'] = 'false';
            $data['content'] = 'Delete failed';
        }
        exit(json_encode($data));
    }

    /**
     * 修改信息
     * @param $data array
     * @return json
     */
    public function message_update($data)
    {
        $re = Articles::where('a_id',$data['a_id'])->update(array('a_title'=>$data['a_title'],'a_content'=>$data['a_content'],'is_publish'=>$data['is_publish']));
        if($re){
            $data['code'] = 10000;
            $data['status'] = 'success';
            $data['content'] = 'Modify the success';
        }else{
            $data['code'] = 10001;
            $data['status'] = 'false';
            $data['content'] = 'Modify the failure';
        }
        exit(json_encode($data));
    }

    /**
     * 标题关键字搜索
     * @param $title 标题关键字
     * @return json
     */
    public function search($title)
    {
        $re = Articles::where('a_title','like','%'.$title.'%')->get()->toArray();
        if($re){
            $data['code'] = 10000;
            $data['status'] = 'success';
            $data['content'] = $re;
        }else{
            $data['code'] = 10001;
            $data['status'] = 'false';
            $data['content'] = 'Temporarily no datae';
        }
        exit(json_encode($data));
    }
}
?>