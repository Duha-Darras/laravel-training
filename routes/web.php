<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');
Route::post('/signup', [HomeController::class, 'signupStore'])->name('signup.store');

Route::get('/users', [UserController::class, 'index'])->name('user.index');



// Route::group(['prefix' => 'home'], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');
//     Route::get('/account', [HomeController::class, 'account'])->name('home.account');
//     Route::get('/sign-up', [HomeController::class, 'signup'])->name('home.signup');
//     Route::post('/sign-up', [HomeController::class, 'create'])->name('home.create');

// });
