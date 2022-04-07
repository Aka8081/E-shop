<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\categorycontroller;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\Cartcontroller;
use App\Http\Controllers\Frontend\Checkoutcontroller;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
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
Route::get('/edit-products/{id}',[ProductController::class,'edit']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('view-category/{slug}/{prod_slug}', [FrontendController::class, 'productview']);



Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class,'index']);
Route::get('/contact', [App\Http\Controllers\HomeController::class,'contact']);

Route::get('/logout', [App\Http\Controllers\HomeController::class,'logout']);

Route::post('delete-cart-item',[cartcontroller::class,'deleteproduct' ]);




    Route::get('/dashboard','Admin\FrontendController@index');
    Route::post('add-to-cart',[Cartcontroller::class,'addproduct']);
    Route::post('delete-cart-item',[Cartcontroller::class,'deleteproduct']);
    Route::post('update-cart/{id}',[Cartcontroller::class,'updatecart']);
    Route::get('cart',[cartcontroller::class,'viewcart']);

    Route::middleware(['auth'])->group(function (){

    Route::get('checkout',[Checkoutcontroller::class,'index']);
    Route::post('place-order',[Checkoutcontroller::class,'placeorder']);

    Route::get('my-order',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'view']);

});


Route::get('categories','Admin\categorycontroller@index');
Route::get('add-category','Admin\categorycontroller@add');
Route::post('insert-category','Admin\categorycontroller@insert');
Route::get('edit-prod/{id}', [categorycontroller::class,'edit']);



Route::get('products',[ProductController::class,'index']);
Route::get('add-products',[ProductController::class,'add']);
Route::post('insert-products',[ProductController::class,'insert']);


Route::post('edit-products/{id}',[ProductController::class,'update']);

Route::get('edit-product/{id}',[ProductController::class,'edit']);



Route::get('Orders',[OrderController::class,'index']);
Route::get('admin/view-order/{id}',[OrderController::class,'view']);
Route::put('update-order/{id}',[OrderController::class,'updateorder']);
Route::get('order-history',[OrderController::class,'orderhistory']);

Route::get('users', [DashboardController::class,'users']);
Route::get('view-user/{id}', [DashboardController::class,'viewuser']);