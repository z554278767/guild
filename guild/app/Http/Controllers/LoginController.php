<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VerifyRepository;

class LoginController extends Controller
{
    /**
     * verify仓库实例。
     * @var VerifyRepository
     * @author [Mr.Yuan] <[<email address>]>
     */
    protected $verify;

    public function __construct(VerifyRepository $verify)
    {
        $this->verify = $verify;
    }

    /**
     *登录
     */
    public function login(Request $request)
    {
        $data = $request->input();
        $res = $this->verify->verify_login($data);
        return $res;
    }
}
?>