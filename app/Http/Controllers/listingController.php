<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listingController extends Controller
{
    public function index(){
        return view('fontEnd.listing');
    }
}
