<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        return view('admin.category.list');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function edit(){
        return view('admin.category.edit');
    }

   
}
