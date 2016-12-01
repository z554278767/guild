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
     * 商会建设列表
     * @return json
     */
    public function check_list()
    {
        $list = $this->commerce->check_list();
        return $list;
    }

    /**
     * 商会建设列表详情
     * @param $id 详情ID
     * @return json
     */
    public function details(Request $request)
    {

    }

}