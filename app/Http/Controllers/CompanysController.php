<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CompanysRepository;

/**
 * 入会审批
 * @author Mr.Yuan
 */
class CompanysController extends Controller
{
    /**
     * Companys仓库实例
     * @var CompanysRepository
     */
    protected $companys;
    function __construct(CompanysRepository $companys)
    {
        $this->companys = $companys;
    }

    /**
     * 审批列表
     * @return json
     */
    public function check_list()
    {
        $list = $this->companys->check_list();
        return $list;
    }

    /**
     * 审批详情
     * @param $id 详情ID
     * @return json
     */
    public function details(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            $details = $this->companys->audit($data);
        }else{
            $id = $request->input('id');
            $details = $this->companys->details($id);
        }
        return $details;
    }

}