<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function edit ( )
    {
        $name = \request () -> query ('name');
//        dd ($name);
        $config=Config::firstOrNew(
            ['name'=>$name]
        );
        //{{$config['data']['WECHAT_TOKEN']??''}} 检测是否存在变量,存在的话使用,否则执行默认值

        return view ('admin.config.edit_'.$name,compact ('name','config'));
    }

    public function update ( Request $request)
    {
//        dd ($request -> all ());
        $name = \request () -> query ('name');

        Config::updateOrCreate(
        //更新或添加,俩个参数,第一个是列的名,搜索的条件,如果有这个字段那就执行更新,否则执行添加
            ['name'=>$name],

            //数组格式无法存入数据库中,所以在模型中使用了模型属性casts data=>array,可以是数据改成我们需要的格式
            ['name'=>$name,'content'=>$request->all ()]
        );
//		hd_edit_env ($request->all ());利用三方插件更改env配置项!
//        hd_edit_env ($request -> all ());
        return back ()->with ('success','操作成功');
    }
}
