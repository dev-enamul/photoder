<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class photoController extends Controller
{
    public function index(){
        return view('fontEnd.photo');
    }
}
