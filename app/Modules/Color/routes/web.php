<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Color\Http\Controllers\ColorController;
Route::get('color', 'ColorController@welcome');
// Route::post('color','ColorController@store');


Route::get('Addcolor',[ColorController::class,'addcolor']);
Route::post('color/addcolor',[ColorController::class,'store']);


// Route::post('adddata',[ColorController::class,'getdata']);
// // Route::post('list',[ColorController::class,'getdata']);
// Route::get('list',[ColorController::class,'show']);
// // Route::get('changeStatus', 'UserController@changeStatus');
// Route::get('checkstatus',[ColorController::class,'show']);
// Route::get('changeStatus',[ColorController::class,'changeStatus']);

// //edit
// Route::get('edit/{id}',[ColorController::class,'edit']);
// Route::POST('edit/{id}',[ColorController::class,'update']);

// // delete
Route::put('completedUpdate',[ColorController::class,'completedUpdate']);

// //trash
 Route::get('trash',[ColorController::class,'trashshow']);

