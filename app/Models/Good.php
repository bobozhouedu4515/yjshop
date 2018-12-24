<?php

namespace App\Models;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Good extends Model
{
    use Searchable;
    protected $guarded=['file','specs','_token'];
    protected $casts=[
        'pictures'=>'array'
    ];

    public function specification ()
    {
        return $this -> hasMany (Specification::class, 'good_id', 'id');
    }

    public function getTree ( $good )
    {
        //引用后盾arr类中的tree方法把数组处理成树状结构;
        $treeData = ( new Arr() ) -> tree ($good, 'name', 'id', 'pid');
        return $treeData;
    }

    public function getSonData ( $id )
    {
        //首先找到主键为$id的类目中所有自己的子类目,pid=$id的所有类目;
        static $sonData = [];
        $data = Good ::all ();
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

        $editData = Good ::whereNotIn ('id', $data)->get();

        return$editData;
    }
    //关联分类
    public function product ()
    {
        return $this -> belongsTo (Product::class);
    }


}
