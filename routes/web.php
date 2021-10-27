<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\photoController;
use App\Http\controllers\videoController;
 

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
Route::get("video",[videoController::class,'index']);


Route::group(['prefix'=>'back','middleware'=>'auth'], function(){
    Route::get('/',[dashboardController::class,'index']);
    Route::get('/category',[categoryController::class,'index']);
    Route::get('/category/create',[categoryController::class,'create']);
    Route::get('/category/edit',[categoryController::class,'edit']);

    Route::group(['middleware'=>'permission:All'], function(){
            //  Permission
        Route::get('/permission',[permissionController::class,'index']);
        Route::get('/permission/create',[permissionController::class,'create']);
        Route::post('/permission/store',[permissionController::class,'store']);
        Route::get('/permission/edit/{id}',[permissionController::class,'edit'])->name('permission-edit');
        Route::put('/permission/edit/{id}',[permissionController::class,'update',])->name('permission-update');
        Route::delete('/permission/delete/{id}',[permissionController::class,'destroy',])->name('permission-delete');

        //  Role
        Route::get('/role',[roleController::class,'index']);
        Route::get('/role/create',[roleController::class,'create']);
        Route::post('/role/store',[roleController::class,'store']);
        Route::get('/role/edit/{id}',[roleController::class,'edit'])->name('permission-edit');
        Route::put('/role/edit/{id}',[roleController::class,'update',])->name('permission-update');
        Route::delete('/role/delete/{id}',[roleController::class,'destroy',])->name('permission-delete');

        //  Author
        Route::get('/author',[authorController::class,'index']);
        Route::get('/author/create',[authorController::class,'create']);
        Route::post('/author/store',[authorController::class,'store']);
        Route::get('/author/edit/{id}',[authorController::class,'edit'])->name('permission-edit');
        Route::put('/author/edit/{id}',[authorController::class,'update',])->name('permission-update');
        Route::delete('/author/delete/{id}',[authorController::class,'destroy',])->name('permission-delete');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

