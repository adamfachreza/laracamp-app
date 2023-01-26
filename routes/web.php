<?php

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
    return view('welcome');
})->name('index');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/success', function () {
    return view('success');
})->name('success');


// socialite route
Route::get('/sign-in-google',[UserController::class,'google'])->name('signin-google');
Route::get('/auth/google/callback',[userController::class,'handleProviderCallbackGoogle'])->name('user.google.callback');

Route::get('/sign-in-github',[UserController::class,'github'])->name('signin-github');
Route::get('/auth/github/callback',[userController::class,'handleProviderCallbackGithub'])->name('user.github.callback');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
