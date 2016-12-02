<?php

namespace App\Repositories;

use Hash;
use App\Members;
use Illuminate\Support\Facades\Input;

/**
 * @var verify仓库
 * @author Mr.Yuan
 */
class VerifyRepository
{
    /**
     * 登录验证
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function verify_login($data)
    {
        if(!empty($data['key']) && $data['key']=="1412phpA"){
            $re = Members::where('m_name',$data['username'])->first();
            if($re){
                $re = $re->toArray();
                $bool = Hash::check($data['password'],$re['m_password']);
                if($bool){
                    $arr['code'] = '10000';     //登陆成功
                    $appkey = Hash::make($data['username'].$data['key'].$data['password']);
                    $arr['data'] = ['status'=>'success','appkey'=>$appkey,'content'=>'Login successful'];
                }else{
                    $arr['code'] = '10002';     //密码错误
                    $arr['data'] = ['status'=>'false','content'=>'Password mistake'];
                }
                return response()->json($arr)->withCallback(Input::get('callback'));
            }else{
                $arr['code'] = '10001';     //用户名不存在
                $arr['data'] = ['status'=>'false','content'=>'User name does not exist'];
                return response()->json($arr)->withCallback(Input::get('callback'));
            }
        }else{
            $arr['code'] = '10003';     //秘钥不正确
            $arr['data'] = ['status'=>'false','content'=>'The secret key error'];
            return response()->json($arr)->withCallback(Input::get('callback'));
        }
    }



}