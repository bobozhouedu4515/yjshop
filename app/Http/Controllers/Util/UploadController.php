<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function upload ( Request $request )
    {
        //获取提交数据中的file,并返回一个对象
        $file = $request -> file ('file');

        if ($file) {
            $this->checkSize ($file);
            $this->checkType ($file);
            $path = $request -> file ('file') -> store ('images','upload');
            return [
                'code' => 0,
                'msg' => 'success',
                'data' => [
                    'src' => '/' . $path
                ]
            ];
        }else{
            return [
                'code'=>1,
                'message'=>'danger',
            ];
        }
    }

    public function checkSize ($file)
    {
        //判断文件大小
        $size=$file->getSize();
        if ($size>hd_config ('upload.size')){
            throw new UploadException('文件过大');
        }
    }

    public function checkType ($file)
    {
        $type=hd_config ('upload.type');
        //允许的的图片类型
        $allowArr=explode ('|', $type);
        //文件的图片类型
        $fileType=$file ->getClientOriginalExtension ();
        if (!in_array (strtolower ($fileType),$allowArr)){
            throw new UploadException('文件类型不符');
        }

    }

}
