<?php

namespace App\Http\Controllers\Home;

use App\Models\Good;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends CommonController
{
    public function index ()
    {

        $id=\request ()->query('id');
        $product=Product::where('id',$id)->first();
//        dd ($product);
        $goods=Good::where('product_id',$id)->get();
        //取商品价格最小值
        return view ('home.goods.index',compact ('goods','product'));
    }

    public function show ()
    {
        $id = \request () -> query ('id');
        $good=Good::where('id',$id)->first();
        $specs=$good->specification;
//        dd ($specs->toArray());
        $size=[];
        $color=[];
        foreach ($specs as $v){
            $size[]=$v['spec'];
            $color[]=$v['color'];
        }
//          dd ($size);
        // dd (array_unique ($size));
        //规格去重
        $onlySize=array_unique ($size);
        $onlyColor=array_unique ($color);
//        dd ($onlySize);
        return view ('home.goods.show',compact ('good','specs','onlySize','onlyColor'));
    }

    public function findSpec ()
    {
        $id = \request ('id');
     $specs= Specification::where('id',$id)->first();
        return $specs;
    }

}
