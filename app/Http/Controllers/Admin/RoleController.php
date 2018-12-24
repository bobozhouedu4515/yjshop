<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all ();
        return view ('admin.role.index',compact ('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.role.create');
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
            'title'=>'required',
            'name'=>'required',
            'guard_name'=>'required'
        ],[
            'title.required'=>'请填写名称',
            'name.required'=>'请填写英文标识',
            'guard_name.required'=>'请守卫名称',
        ]);
        Role ::create ($request -> all ());
        return redirect () -> route ('admin.role.index') -> with ('success', '操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view ('admin.role.edit',compact ('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate ($request,[
            'title'=>'required',
            'name'=>'required',
            'guard_name'=>'required'
        ],[
            'title.required'=>'请填写名称',
            'name.required'=>'请填写英文标识',
            'guard_name.required'=>'请守卫名称',
        ]);
        $role->update ($request->all ());

        return redirect () -> route ('admin.role.index') -> with ('success', '操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete ();
        return redirect () -> route ('admin.role.index') -> with ('success', '操作成功');
    }

    public function setPermission (Role $role)
    {
        $permissions=Permission::all ();
        return view ('admin.role.set_permission',compact ('role','permissions'));
    }

    public function setPermissionStore (Role $role, Request $request)
    {

        $role->syncPermissions ($request->name);
        return redirect () -> route ('admin.role.index') -> with ('success', '操作成功');

    }
}
