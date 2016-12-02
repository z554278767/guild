<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PunishRepository;

class PunishController extends Controller
{
    /**
     * verify仓库实例。
     * @var VerifyRepository
     * @author [Mr.Yuan] <[<email address>]>
     */
    protected $punish;

    public function __construct(PunishRepository $punish)
    {
        $this->punish = $punish;
    }

    /**
     * 联合惩戒列表
     */
    public function Punish_list()
    {
        $re = $this->punish->Punish_list();
        return $re;
    }

    /**
     * 惩戒详情
     */
    public function punish_details(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->input();
            $details = $this->punish->audit($data);
        }
        else
        {
            $id=$request->input('j_id');
            $details = $this->punish->punish_details($id);
        }
        return $details;
    }
    /**
     * 联合惩戒添加
     */
    public function punish_add(Request $request)
    {
        $data = $request->input();
        $re = $this->punish->punish_add($data);
        return $re;
    }
}
?>