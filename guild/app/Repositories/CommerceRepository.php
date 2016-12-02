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
     * 商会建设列表
     * @return json
     */
    public function check_list()
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
}
?>