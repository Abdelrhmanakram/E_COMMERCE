<?php

use App\Events\NewTrade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("redirect", [HomeController::class, 'redirect'])->name('user.home');

Route::controller(ProductController::class)->group(function () {

    Route::middleware('Is_admin')->group(function () {

        Route::get("/allproducts", "all");
        Route::get("products/show/{id}", "show");

        Route::get("create", 'create');
        Route::post("store", "store");

        Route::get("product/edit/{id}", "edit");
        Route::put('product/{id}', "update");

        Route::delete("products/{id}", "delete");
        Route::get("searchad", "search");
    });
});



Route::controller(UserController::class)->group(function () {
    Route::get("/products", "all");
    Route::get("products/showone/{id}", "show");
    Route::get("cart/{id}", "cart");
    Route::get("search", "search");
    Route::get("msg","msg");

});

Route::get("change/{lang}", function ($lang) {

    if ($lang == "ar") {
        session()->put("lang", "ar");
    } else {
        session()->put("lang", "en");
    }

    return redirect()->back();
});


Route::get("trade", function () {
    NewTrade::dispatch();
    return "success";
});



Route::get("login/google", [LoginController::class, 'redirectGoogle'])->name('login.google');
Route::get("login/google/callback", [LoginController::class, 'redirectGoogleCallback']);


Route::get("login/facebook", [LoginController::class, 'redirectFacebook'])->name('login.facebook');
Route::get("login/facebook/callback", [LoginController::class, 'redirectFacebookCallback']);



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
