<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');

});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/addProducts', function () {
    return view('addProducts');
})->middleware('can:privilege');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');


Route::post('/register',[UserController::class,'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/index',[ProductController::class,'index'])->name('product.index');
Route::get("detail/{id}",[ProductController::class,'detail'])->name('product.detail');
Route::get("/search",[ProductController::class,'search']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("/cartList",[ProductController::class,'cartList'])->name('cart.list');
Route::get("/buy_now", [ProductController::class, 'buyNow'])->name('buyNow');
Route::get("removeCart/{id}",[ProductController::class,'removeCart'])->name('removeCart');
Route::post("/orderPlace",[ProductController::class,'orderPlace'])->name('orderPlace');
Route::get("/myOrders",[ProductController::class,'myOrders'])->name('myOrders');
Route::post('/addProducts',[ProductController::class,'addProducts'])->name('addProducts');

