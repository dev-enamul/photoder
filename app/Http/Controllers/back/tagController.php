<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Tag List";
        $data = Tag::all();

        return view('admin.tag.list',compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name ="Tag Create";
        return view('admin.tag.create',compact('page_name'));
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
            'name' =>'required | unique:tags',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = str::slug($request->name);
        $tag->description = $request->description;
        $tag->save();
        return redirect()->route('tagList')->with('success',$request->name. ' Tag Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Tag Update";
        $data = Tag::find($id);
        return view('admin.tag.edit',compact('data','page_name'));
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
        $tag = Tag::find($id);
         
        if($tag->name != $request->name){
            $this->validate($request,[
                'name'=>'required | unique:tags',
            ]);
        }
        $tag->name = $request->name;
        $tag->slug = str::slug($request->name);
        $tag->description=$request->description;
        $tag->save();

        return redirect()->route('tagList')->with('success',$tag->name.' Update Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back()->with('success',$tag->name.' Delete Success');
    }


    public function status($id){
        $tag = Tag::find($id);
        if($tag->status ===1){
            $tag->status = 0;
        }else{
            $tag->status = 1;
        }
        $tag->save();

        return redirect()->route('tagList')->with('success',$tag->name.' Update Success');

    }
}
