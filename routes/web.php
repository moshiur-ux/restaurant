<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes(['register'=>false]); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('Category', App\Http\Controllers\CategoryController::class)->middleware('auth');

Route::resource('Food', App\Http\Controllers\FoodController::class)->middleware('auth');
//Route::resource('/',App\Http\Controllers\FoodController::class );
Route::get('/',[App\Http\Controllers\FoodController::class, 'listFood']);





