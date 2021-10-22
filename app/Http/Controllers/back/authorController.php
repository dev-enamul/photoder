<?php

namespace App\Http\Controllers\back;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use DB;
Use Illuminate\Support\Facades\Hash;
use Shanmuga\LaravelEntrust\Models\EntrustRole;

class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name ="Author";
        $data= User::get();
        return view('admin.author.list',compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Author Create';
        $role = Role::pluck('name','id');
        return view('admin.author.create',compact('role','page_name'));
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
            'email'=>'required | email | unique:users',
            'password'=>'required | size:6',
            'role.*'=>'required',
        ]);
    $author = new User();
    $author->name = $request->name;
    $author->email = $request->email;
    $author->password = Hash::make($request->password);
    $author->save(); 

    foreach($request->role as $value){
    
        $author->attachRole($value);
    }
    return redirect('back/author')->with('success',$author->name.' Author Created Success');
    
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
        $page_name = 'Author Edit';
        $data = User::find($id);
        $role = Role::pluck('name','id');
        $selected_role = DB::table('role_user')->where('user_id',$id)->pluck('role_id')->toArray();
        return view('admin.author.edit',compact('page_name','data','role','selected_role'));
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
        $author = User::find($id);
            $this->validate($request,[
                'name'=> 'required',
                'email'=>'required | email',
                'role.*'=>'required',
            ]);

            if($request->email != $author->email){
                $this->validate($request,[
                    'email'=>'unique:users',
                ]);
                $author->email = $request->email;
            }

            if($request->password!=NULL){
                $author->password = Hash::make($request->password);
            }
            $author->name = $request->name;
            $author->save(); 

            DB::table('role_user')->where('user_id',$id)->delete();

            foreach($request->role as $value){
            
                $author->attachRole($value);
            }
            return redirect('back/author')->with('success',$author->name.' Author Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('back/author')->with('success',$user->name.' Delete Success');
    }
}
