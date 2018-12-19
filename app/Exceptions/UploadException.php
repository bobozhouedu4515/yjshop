<?php

namespace App\Exceptions;

use Exception;

class UploadException extends Exception
{
    public function render ()
    {
        //抛出的异常json由使用的第三方类决定,看他需要什么样的返回数据
        return response ()->json (['msg'=>$this->getMessage (),
            'code'=>403],200);
    }
}
