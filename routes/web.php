<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\homeController;
use App\Http\controllers\photoController;
use App\Http\controllers\welcomeController;
use App\Http\Controllers\back\dashboardController; 
use App\Http\Controllers\back\permissionController; 
use App\Http\Controllers\back\roleController; 
use App\Http\Controllers\back\authorController; 
use App\Http\Controllers\back\tagController; 
 

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
Route::get("/",[photoController::class,'index']);
Route::get("/video",[videoController::class,'index']);
Route::get("/about",[aboutController::class,'index']);
Route::get("/contact",[contactController::class,'index']);

Route::group(['prefix'=>'back','middleware'=>'auth'], function(){
        Route::get('/',[dashboardController::class,'index']);
  
            //  Permission
        Route::get('/permission',[permissionController::class,'index'])->middleware(['permission:All|Permission List'])->name('permissionEdit');
        Route::get('/permission/create',[permissionController::class,'create'])->middleware(['permission:All|Permission Add'])->name('permissionCreate');
        Route::post('/permission/store',[permissionController::class,'store'])->middleware(['permission:All|Permission Add'])->name('permissionStore');
        Route::get('/permission/edit/{id}',[permissionController::class,'edit'])->middleware(['permission:All|Permission Edit'])->name('permissionEdit');
        Route::put('/permission/edit/{id}',[permissionController::class,'update',])->middleware(['permission:All|Permission Edit'])->name('permissionUpdate');
        Route::delete('/permission/delete/{id}',[permissionController::class,'destroy',])->middleware(['permission:All|Permission Delete'])->name('permissionDelete');

        //  Role
        Route::get('/role',[roleController::class,'index'])->middleware(['permission:All|Role List'])->name('roleList');
        Route::get('/role/create',[roleController::class,'create'])->middleware(['permission:All|Role Add'])->name('roleCreate');
        Route::post('/role/store',[roleController::class,'store'])->middleware(['permission:All|Role Add'])->name('roleStore');
        Route::get('/role/edit/{id}',[roleController::class,'edit'])->middleware(['permission:All|Role Edit'])->name('roleEdit');
        Route::put('/role/edit/{id}',[roleController::class,'update',])->middleware(['permission:All|Role Edit'])->name('roleUpdate');
        Route::delete('/role/delete/{id}',[roleController::class,'destroy',])->middleware(['permission:All|Role Delete'])->name('permission-delete');

        //  Author
        Route::get('/author',[authorController::class,'index'])->middleware(['permission:All|Author List'])->name('authorList');
        Route::get('/author/create',[authorController::class,'create'])->middleware(['permission:All|Author Add'])->name('authorCreate');
        Route::post('/author/store',[authorController::class,'store'])->middleware(['permission:All|Author Add'])->name('authorStore');
        Route::get('/author/edit/{id}',[authorController::class,'edit'])->middleware(['permission:All|Author Edit'])->name('authorEdit');
        Route::put('/author/edit/{id}',[authorController::class,'update',])->middleware(['permission:All|Author Edit'])->name('authorUpdate');
        Route::delete('/author/delete/{id}',[authorController::class,'destroy',])->middleware(['permission:All|Author Delete'])->name('authorDelete');

        //  Author
        Route::get('/tag',[tagController::class,'index'])->middleware(['permission:All|Tag List'])->name('tagList');
        Route::get('/tag/create',[tagController::class,'create'])->middleware(['permission:All|Tag Add'])->name('tagCreate');
        Route::post('/tag/store',[tagController::class,'store'])->middleware(['permission:All|Tag Add'])->name('tagStore');
        Route::get('/tag/edit/{id}',[tagController::class,'edit'])->middleware(['permission:All|Tag Edit'])->name('tagEdit');
        Route::get('/tag/status/{id}',[tagController::class,'status'])->middleware(['permission:All|Tag Edit'])->name('tagStatus');
        Route::put('/tag/edit/{id}',[tagController::class,'update',])->middleware(['permission:All|Tag Edit'])->name('tagUpdate');
        Route::delete('/tag/delete/{id}',[tagController::class,'destroy',])->middleware(['permission:All|Tag Delete'])->name('tagDelete');
 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

