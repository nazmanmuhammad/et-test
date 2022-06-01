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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {

Route::resource('/user','App\Http\Controllers\Internal\UserController');
Route::resource('/internal/product','App\Http\Controllers\Internal\ProductController');
Route::resource('/internal/userjson','App\Http\Controllers\Internal\UserJsonController');
Route::get('/logout','App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');
Route::resource('internal/productjson','App\Http\Controllers\Internal\ProductJsonController');
});