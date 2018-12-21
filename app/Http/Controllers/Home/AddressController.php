<?php

namespace App\Http\Controllers\Home;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::where ('user_id',auth ()->id ())->get();
        return view ('home.address.index',compact ('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses=Address::all ();

        return view ('home.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Address $address)
    {

        $address=auth ()->user ()->address()->create($request->all ());

        if($request->select){
            Address::where('user_id',auth()->id())->where('id','!=',$address['id'])->update(['select'=>0]);
        }
        return redirect ()->route ('home.address.index')->with ('success','添加成功');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {

        return view ('home.address.edit',compact ('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
//        dd ($request -> all ());
        $address -> update ($request -> all ());
        return redirect ()->route ('home.address.index')->with ('success','修改成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {

        $address -> delete ();
        return back () -> with ('success', '删除成功');

    }

    public function select_adr (Address $address)
    {
//        dd (\request ()->all ());
        $id = \request ('id');
      $res=  Address::where('user_id',auth()->id())->where('id',$id)->update(['select'=>1]);
//        dd ($res);
        Address::where('user_id',auth()->id())->where('id','!=',$id)->update(['select'=>0]);

        return ['code'=>1,'msg'=>'设置成功'];

    }

}
