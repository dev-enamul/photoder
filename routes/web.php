<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\homeController;
use App\Http\controllers\listingController;
use App\Http\controllers\detailsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('');
// });
Route::get("/",[homeController::class,'index']);
Route::get("/listing",[listingController::class,'index']);
Route::get("/details",[detailsController::class,'index']);
