<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\homeController;
use App\Http\controllers\listingController;
use App\Http\controllers\detailsController;
use App\Http\Controllers\back\dashboardController; 
use App\Http\Controllers\back\categoryController; 

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

Route::group(['prefix'=>'back'], function(){
 Route::get('/',[dashboardController::class,'index']);
 Route::get('/category',[categoryController::class,'index']);
 Route::get('/category/create',[categoryController::class,'create']);
 Route::get('/category/edit',[categoryController::class,'edit']);
});
