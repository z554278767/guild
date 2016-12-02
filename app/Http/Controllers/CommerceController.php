<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommerceRepository;

/**
 * 商会建设
 * @author Mr.zqp
 */
class CommerceController extends Controller
{
    /**
     * Commerce仓库实例
     * @var CommerceRepository
     */
    protected $commerce;
    function __construct(commerceRepository $commerce)
    {
        $this->commerce = $commerce;
    }

    /**
     * 动态添加
     * @return json
     */
    public function message_add(Request $request)
    {
        $data = $request->input();
        $re = $this->commerce->message_add($data);
        return $re;
    }

    /**
     * 动态删除
     * @return json
     */
    public function message_del(Request $request)
    {
        $a_id = $request->input('a_id');
        //print_r($a_id);die;
        $re = $this->commerce->message_del($a_id);
        return $re;
    }

    /**
     * 动态修改
     * @return json
     */
    public function message_update(Request $request)
    {
        $data = $request->input();
        $re = $this->commerce->message_update($data);
        return $re;
    }

    /**
     * 标题关键字搜索
     * @return json
     */
    public function search(Request $request)
    {
        $title = $request->input('title');
        $re = $this->commerce->search($title);
        return $re;
    }
}