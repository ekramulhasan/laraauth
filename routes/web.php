<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('register',[RegisterController::class,'registerUser'])->name('register.db');
Route::post('logout',[RegisterController::class,'logout'])->name('logout');


Route::get('login',[RegisterController::class,'login'])->name('login');
Route::post('loginUser',[RegisterController::class,'loginUser'])->name('loginUser');


