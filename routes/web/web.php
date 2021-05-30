<?php

use Illuminate\Support\Facades\Route; 

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


 Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminControlle::class, 'index'])->name('admin.index');
    

  
   
 }); 



//  Route::middleware(['role:ADMIN','auth'])->group(function(){
//    Route::get('admin/users',[App\Http\controllers\UserController::class,'index'])->name('users.index');
//  });
 //  Route::get('admin/posts/{post}/edit',[App\Http\Controllers\PostController::class, 'edit'])->middleware('can:view,post')->name('post.edit');  