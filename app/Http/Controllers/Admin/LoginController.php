<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index ()
    {
        return view ('admin.login.index');

    }

    public function loginStore (LoginRequest $request)
    {
        //提交登录信息,admin模型继承了User模型所以可以使用attempt方法;
//        dd ($request->all ());
        if (!\Auth::guard('admin')->attempt (['username'=>request ()->username,'password'=>request ()->password],request ()->remember)){

            return back ()->with ('danger','账号或者密码错误');
        }
        return redirect () -> route ('admin.index') ;
    }

    public function logout ()
    {

        if (\Auth::guard ('admin')->check ()){
//            dd (1);
            \Auth::guard ('admin')->logout ();
            return redirect () -> route ('admin.login.index') -> with ('success', '已退出');
        }else{
            return redirect () -> route ('admin.login.index') -> with ('danger', '你还没有登录');
        }


    }




}
