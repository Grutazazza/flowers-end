<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    $tovars = \App\Models\Tovar::all()->sortByDesc('id')->take(4);
    return view('common.main',compact('tovars'));
})->name('welcome');

Route::get('register',[UserController::class,'register'])->name('register');
Route::post('register',[UserController::class,'registerPost']);

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'loginPost']);

Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::get('catalog',[TovarController::class,'catalog'])->name('catalog');
Route::get('tovar/{tovar}',[TovarController::class,'show'])->name('tovar');



Route::middleware('auth')->group(function (){                                   //только для авторизованных
        Route::middleware('role')->group(function () {                        //только для админов
            Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
                Route::get('/tovars',[AdminController::class,'tovar'])->name('admTovars');
                Route::resource('/tovar',TovarController::class);
                Route::resource('/category', CategoryController::class);
            });
        });
    Route::get('/show/{tovar}',[MainController::class,'show'])->name('show');
    Route::get('/add/{tovar}',[MainController::class,'toBasket'])->name('add');
    Route::get('/newBasket',[MainController::class,'newBasket'])->name('newBasket');
    Route::post('/newBasket',[MainController::class,'createOrder']);
    Route::get('/contact',[MainController::class,'contact'])->name('contact');
    Route::get('/basket',[MainController::class,'basket'])->name('basket');
    Route::get('/deny/{basket}',[MainController::class,'deny'])->name('deny');
});                                                                                      //конец для авторизованных
