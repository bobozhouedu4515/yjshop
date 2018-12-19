<?php

namespace App\Http\Controllers\Util;

use App\Notifications\UserNotification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function send ()
    {
        $email = \request () -> only ('email');
//        dd ($email);
       $code= $this->makeCode ();
      $user= User::firstOrNew(['email'=>$email['email']]);
//        dd ($user);
        $user->notify(new UserNotification($code));
        if ($user){
            session ()->put ('code',$code);
            return ['code'=>1,'msg'=>'发送成功'];
        }else{
            return ['code'=>0,'msg'=>'服务器繁忙'];
        }


    }

    public function makeCode ()
    {
        $code='';
        for($i=0;$i<4;$i++){
            $code.=mt_rand (0,9);
    }
    return $code;
    }
}
