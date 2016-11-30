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
     * @return string
     */
    public function check_list()
    {

    }
}