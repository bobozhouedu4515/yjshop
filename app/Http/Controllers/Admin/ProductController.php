<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all ()->toArray ();
        //调用Product模型中的getTree方法,把数据装换成树状;
        $products=(new Product())->getTree($product);

        return view ('admin.product.index',compact ('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all ();

        return view ('admin.product.create',compact ('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request,Product $product)
    {
        $product->fill(['name'=>$request->name,'pid'=>$request->pid])
            ->save();
        return redirect () -> route ('admin.product.index') -> with ('success', '操作成功');
    }


    public function edit(Product $product)
    {
        //编辑的时候不可以选择自己和他的子栏目,所以做了递归查找所有子栏目,然后把他们排除在外.
        $sonData =  $product  -> getSonData($product ->id);
        $sonData[] = $product[ 'id' ];
        $editData= $product -> getEditData ($sonData);
        $editData=$editData->toArray();
        $products= $product -> getTree ($editData);

        return view ('admin.product.edit',compact ('products','product'));
    }


    public function update(ProductRequest  $request, Product $product)
    {
        $product->update($request->all ());

        return redirect () -> route ('admin.product.index') -> with ('success', '操作成功');
    }


    public function destroy(Product $product)
    {
        $data=$product->getSonData ($product->id);

        //先判断是否还有子栏目,如果有子栏目,先删除子栏目
        if (!$data){
            $product->delete ();
            return back () -> with ('success', '操作成功');
        }
        return back () -> with ('danger', '请先删除子类目');
    }
}
