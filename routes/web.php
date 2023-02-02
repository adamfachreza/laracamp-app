<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\UserController as UserDashboard;
use App\Http\Controllers\Admin\AdminController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\Admin\DiscountController as AdminDiscount;

use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'welcome'])->name('welcome');


// socialite route
Route::get('/sign-in-google',[UserController::class,'google'])->name('signin-google');
Route::get('/auth/google/callback',[userController::class,'handleProviderCallbackGoogle'])->name('user.google.callback');
Route::get('/sign-in-github',[UserController::class,'google'])->name('signin-github');
Route::get('/auth/github/callback',[userController::class,'handleProviderCallbackGithub'])->name('user.github.callback');
//

//midtrans route get buat pembayaran ewallet, yg post buat pembayaran di indomart
Route::get('payment/success',[checkoutController::class,'midtransCallback']);
Route::post('payment/success',[checkoutController::class,'midtransCallback']);


Route::middleware(['auth'])->group(function(){
    // checkout
    Route::get('/checkout/success',[CheckoutController::class,'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('/checkout/{camp:slug}',[CheckoutController::class,'create'])->name('checkout')->middleware('ensureUserRole:user');
    Route::post('/checkout/{camp}',[CheckoutController::class,'store'])->name('checkout.store')->middleware('ensureUserRole:user');

    // user dashboard
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
        Route::get('/',[UserDashboard::class,'index'])->name('dashboard');
    });

    // admin dashboard
    // penggunaan ->namespace() tidak efektif untuk penggunaan definisi pada routing
    Route::prefix('admin/dashboard')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/',[AdminDashboard::class,'index'])->name('dashboard');

        Route::post('/checkout/{checkout}',[AdminCheckout::class,'update'])->name('checkout.update');

       Route::resource('discount', AdminDiscount::class);
    });

    // Route::get('dashboard/checkout/invoice/{checkout}',[CheckoutController::class,'invoice'])->name('user.checkout.invoice');

});
require __DIR__.'/auth.php';
