<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name= 'Permission';
        $data = Permission::all();
        return view('admin.permission.list',compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.permission.create');
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
            'name'=>'required',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        return redirect('back/permission')->with('success', 'Permision Created Success');
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
       $data = Permission::find($id);
       return view('admin.permission.edit',compact('data'));
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
            'name'=>'required | unique:permissions',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        return redirect('back/permission')->with('success', 'Permision Update Success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect('back/permission')->with('success', $permission->name." Delete Success");
    }
}
