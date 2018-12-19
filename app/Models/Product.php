<?php

namespace App\Models;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ 'name', 'pid',
    ];

    public function getTree ( $product )
    {
        //引用后盾arr类中的tree方法把数组处理成树状结构;
        $treeProduct = ( new Arr() ) -> tree ($product, 'name', 'id', 'pid');
        return $treeProduct;
    }

    public function getSonData ( $id )
    {
        //首先找到主键为$id的类目中所有自己的子类目,pid=$id的所有类目;
        static $sonData = [];
        $data = Product ::all ();
        foreach ($data as $v) {
            if ($v['pid']==$id){
                $sonData[] = $v['id'];
                $v->getSonData($v['id']);
            }
        }
        return $sonData;
    }

    public function getEditData ($data)
    {
        //获取id不在$data范围中的数据,并返回一个对象
        $editData = Product ::whereNotIn ('id', $data)->get();

        return$editData;
    }
}
