<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\categoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

Route::prefix(LaravelLocalization::setLocale())->group(function () {


    Route::prefix('admin')->name('admin.')->middleware('auth', 'user_type', 'verified')->group(function () {
        // Route::get('/{local?}', [AdminController::class, 'index'])->name('index');

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::resource('categories', categoryController::class);

        Route::resource('products', ProductController::class);
    });
});


Auth::routes(['verify' => true]); // login , register

// Auth::routes(['verify' => true, 'register' => false]); // login , register

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('no-access', 'no_access');

//site Routes

Route::get('/', function () {
    return 'home';
})->name('site.index');