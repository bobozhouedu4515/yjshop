<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::all ();
        return view ('admin.admin.index',compact ('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate ($request,[
            'username'=>'required',
            'password'=>'required|confirmed',

        ],[
            'username.required'=>'请填写名称',
            'password.required'=>'请填写密码',
            'password.confirmed'=>'密码不一致',
        ]);

        Admin ::firstOrNew(['username'=>$request->username])->fill(['password'=>bcrypt ($request->password)])->save();
        return redirect () -> route ('admin.admin.index') -> with ('success', '操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {

        return view ('admin.admin.edit',compact ('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validate ($request,[
            'username'=>'required',
            'password'=>'required|confirmed',

        ],[
            'username.required'=>'请填写名称',
            'password.required'=>'请填写密码',
            'password.confirmed'=>'密码不一致',
        ]);

        $admin->update (['password'=>bcrypt ($request->password)]);
        return redirect () -> route ('admin.admin.index') -> with ('success', '操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete ();
        return redirect () -> route ('admin.admin.index') -> with ('success', '操作成功');
    }

    public function setRole (Admin $admin)
    {
        $roles = Role ::all ();
        return view ('admin.admin.set_role',compact ('roles','admin'));
    }

    public function setRoleStore (Admin $admin,Request $request)
    {
//        dd ($request -> all ());
        $admin->assignRole ($request->name);
        return redirect () -> route ('admin.admin.index') -> with ('success', '操作成功');
    }

}
