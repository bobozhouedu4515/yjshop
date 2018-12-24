<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Home\CommonController;
use App\Http\Requests\GoodRequest;
use App\Models\Good;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods=Good::all ();

        return view ('admin.good.index',compact ('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::all ()->toArray ();
        //调用Product模型中的getTree方法,把数据装换成树状;
        $products=(new Product())->getTree($product);

        return view ('admin.good.create',compact ('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodRequest $request)
    {

        DB::beginTransaction();
        $data=$request->all ();
//        dd ($data);
        $data[ 'admin_id' ] = auth ('admin') -> id ();

        $specs = json_decode ( $data['specs'] , true );

        $total = 0;
        foreach ( $specs as $v )
        {
            $total += $v['total'];
        }
        $data['total'] = $total;



        $good=  Good ::create($data);
        foreach ( $specs as $v )
        {
            $spec        = new Specification();
            $spec->spec  = $v['size'];
            $spec->color  = $v['color'];
            $spec->total = $v['total'];
            $spec->good_id =$good->id;
            $spec->save ();
        }
        DB ::commit ();
        return redirect ()->route ('admin.good.index')->with ('success','操作成功');
    }


    public function edit(Good $good)
    {
        $product=Product::all ()->toArray ();
        //调用Product模型中的getTree方法,把数据装换成树状;
        $products=(new Product())->getTree($product);

        $data= $good->specification->toArray();
        $jsonData=json_encode ($data,true);
//        dd ($jsonData);

        return view ('admin.good.edit',compact ('good','products','jsonData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(GoodRequest $request, Good $good)
    {
        DB::beginTransaction();
        //获取提交数据
        $data=$request->all ();
//        dd ($)
        //获取规格表中的所有数据
        $specs=Specification::all ();
        //如果规格表中的good_id=$good的id 那么执行删除;
        foreach ($specs as $v){

            if ($v['good_id']==$good['id']){
                $v->delete ();
            }
        }
        //添加admin_id字段
        $data[ 'admin_id' ] = auth ('admin') -> id ();
        //把json数据转成数组
        $specsData = json_decode ( $data['specs'] , true );
        //获取goods表中的total的值
        $total = 0;
        foreach ( $specsData as $v )
        {
            $total += $v['total'];
        }
        $data['total'] = $total;
        //对$good执行更新
        $good->update($data);
        //重新再规格表中执行添加数据
        foreach (  $specsData  as $v )
        {
            $spec        = new Specification();
            $spec->spec  = $v['spec'];
            $spec->color  = $v['color'];
            $spec->total = $v['total'];
            $spec->good_id =$good->id;
            $spec->save ();
        }
        DB ::commit ();
        return redirect ()->route ('admin.good.index')->with ('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        $good->delete();

        return redirect ()->route ('admin.good.index')->with ('success','操作成功');

    }

    public function search (Request $request)
    {
        $kw=$request->kw;
     $goods=Good::search ($kw)->get ();
//        dd ($goods);

        return view ('home.goods.search_res', compact ('goods','kw'));

    }
}
