<?php

namespace App\Http\Controllers\back;

use App\Models\Role;
use DB;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Role List";

        $data = Role::all();

        return view('admin.role.list',compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Role Create';
        $permission = Permission::pluck('name','id');
        return view('admin.role.create',compact('permission','page_name'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'permission'=>'required | array',
            'permission.*'=>'required | string'
        ]);
    $role = new Role();
    $role->name = $request->name;
    $role->display_name = $request->display_name;
    $role->description = $request->description;
    $role->save();

    foreach($request->permission as $value){
        $role->attachPermission($value);
    }
    return redirect('back/role')->with('success','Role Create Success');

}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $page_name="Edit Role";
        $data = Role::find($id);
        $permission = Permission::pluck('name','id');
        $selectedPermission = DB::table('permission_role')->where('permission_role.role_id',$id)->pluck('permission_id')->toArray();
       return view('admin.role.edit',compact('data','page_name','permission','selectedPermission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> 'required',
            'permission'=>'required | array',
            'permission.*'=>'required | string'
        ]);
    $role = Role::find($id);
    $role->name = $request->name;
    $role->display_name = $request->display_name;
    $role->description = $request->description;
    $role->save();

    DB::table('permission_role')->where('role_id',$id)->delete();

    foreach($request->permission as $value){
        $role->attachPermission($value);
    }
    return redirect('back/role')->with('success',$role->name.' Role Delete Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('back/role')->with('success',$role->name.' Role Update Success');
    }
}
