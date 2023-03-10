<?php


use App\Mail\InvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SiteController;
use App\Notifications\NewOrderNotification;
use App\Http\Controllers\Admin\UserController;
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

        Route::get('delete-image/{id}', [ProductController::class, 'delete_image'])->name('products.delete_image');

        Route::get('users', [UserController::class, 'index'])->name('users.index');

        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Auth::routes(['verify' => true]); // login , register

    // Auth::routes(['verify' => true, 'register' => false]); // login , register

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::view('no-access', 'no_access');

    //site Routes

    // Route::get('/', function () {
    //     return 'home';
    // })->name('site.index');

    Route::get('/', [SiteController::class, 'index'])->name('site.index');
    Route::get('/about', [SiteController::class, 'about'])->name('site.about');
    Route::get('/shop', [SiteController::class, 'shop'])->name('site.shop');
    Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
    Route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');
    Route::get('/product/{slug}', [SiteController::class, 'product'])->name('site.product');
    Route::get('/search', [SiteController::class, 'search'])->name('site.search');

    Route::post('/product/{slug}/review', [SiteController::class, 'product_review'])->name('site.product_review');
    Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('site.add_to_cart');

    Route::get('/cart', [CartController::class, 'cart'])->name('site.cart')->middleware('auth'); //???????? ?????????? ???????? ???????? ???????? ???????? ???????? ???????????? ??????
    Route::post('/update-cart', [CartController::class, 'update_cart'])->name('site.update_cart')->middleware('auth');
    Route::get('/cart/{id}', [CartController::class, 'remove_cart'])->name('site.remove_cart')->middleware('auth');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('site.checkout')->middleware('auth');
    Route::get('/payment', [CartController::class, 'payment'])->name('site.payment')->middleware('auth');
    Route::get('/payment/success', [CartController::class, 'success'])->name('site.success')->middleware('auth');
    Route::get('/payment/fail', [CartController::class, 'fail'])->name('site.fail')->middleware('auth');

});

// Don't Do This Just For Test Only

Route::get('send-notification' , function (){

//    // $user = Auth::user();
//   //  Mail::to($user->email)->send(new InvoiceMail());

//    // Mail::to($user->email)->send(new InvoiceMail());
//    // $user->notify(new NewOrderNotification());



 });




Route::get('invoice1', function (){
  //   return view('pdf.invoice');

        $order = order::find(2);

        $pdf = Pdf::loadView('pdf.invoice' , ['order' => $order]);

        $pdf->save('invoice/latest.pdf');

});
