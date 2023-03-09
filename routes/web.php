<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestController as R;
use App\Http\Controllers\MenuController as M;
use App\Http\Controllers\DishController as D;
use App\Http\Controllers\FrontController as F;

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
    return view('layouts.front');
});

Route::prefix('admin/rests')->name('rests-')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/create', [R::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [R::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{rest}', [R::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{rest}', [R::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{rest}', [R::class, 'destroy'])->name('destroy')->middleware('roles:A');
});

Route::prefix('admin/menus')->name('menus-')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index')->middleware('roles:A');
    // Route::get('/show/{menu}', [M::class, 'show'])->name('show');
    // Route::get('/pdf/{menu}', [M::class, 'pdf'])->name('pdf');
    Route::get('/create', [M::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [M::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{menu}', [M::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{menu}', [M::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{menu}', [M::class, 'destroy'])->name('destroy')->middleware('roles:A');
});

Route::prefix('admin/dishes')->name('dishes-')->group(function () {
    Route::get('/', [D::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/show/{dish}', [D::class, 'show'])->name('show');
    // Route::get('/pdf/{dish}', [D::class, 'pdf'])->name('pdf');
    Route::get('/create', [D::class, 'create'])->name('create')->middleware('roles:A');
    Route::get('/createSecondadry', [D::class, 'createSecondadry'])->name('createSecondadry')->middleware('roles:A');
    Route::post('/create', [D::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{dish}', [D::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{dish}', [D::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{dish}', [D::class, 'destroy'])->name('destroy')->middleware('roles:A');
});

Route::get('/', [F::class, 'home'])->name('main')->middleware('roles:C|A');
Route::get('/dish/{dish}', [F::class, 'showdish'])->name('show-dish');
Route::get('/country/{country}', [F::class, 'showCountrydishs'])->name('show-country-dishs');
Route::post('/add-to-cart', [F::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [F::class, 'cart'])->name('cart');
Route::post('/cart', [F::class, 'updateCart'])->name('update-cart');
Route::post('/make-order', [F::class, 'makeOrder'])->name('make-order');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
