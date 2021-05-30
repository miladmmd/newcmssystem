<?php 

Route::put('/users/{user}/update',[App\Http\controllers\UserController::class,'update'])->name('user.profile.update');
  
Route::delete('/users/{user}/destroy',[App\Http\controllers\UserController::class,'destroy'])->name('users.destroy');

Route::middleware('role:ADMIN')->group(function(){
    Route::get('/users',[App\Http\controllers\UserController::class,'index'])->name('users.index');
  });
 
  Route::middleware(['auth','can:view,user'])->group(function(){
    Route::get('/users/{user}/profile',[App\Http\controllers\UserController::class,'show'])->name('user.profile.show');
  }); 