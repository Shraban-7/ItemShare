<?php

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BookingctController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;

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
    $products = Product::where('is_available', 1)->latest()->take(4)->get();
    $reviews = Review::orderBy('rating', 'desc')->take(16)->get();
    $categories = Category::all();

    return view('frontend.pages.home',compact('products','reviews','categories'));
})->name('main');
Route::get('/how_to', function () {


    return view('frontend.pages.how');
})->name('how_to');

Auth::routes();

require __DIR__ . '/admin.php';

Route::post('/toggle-role', [RoleController::class,'toggleRole'])->name('toggle.role');



Route::resource('products', ProductController::class)->middleware('auth');

Route::get('contact', [ContactController::class, 'index'])->middleware('auth')->name('contact.index');


Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');

Route::post('contact', [ContactController::class, 'store'])->middleware('auth')->name('contact.store');






Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product', [FrontendController::class, 'product'])->name('products.home');
Route::get('/product/category/{category}', [FrontendController::class, 'productsByCategory'])->name('products.by.category');
Route::get('/product/{product}', [ProductController::class, 'details'])->name('products.details');
Route::get('admin/product/', [ProductController::class, 'admin_product'])->name('products.admin');
Route::middleware('auth')->group(function () {
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}/show', [BookingController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/cancel/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::post('/bookings/change-status/{bookingId}', [BookingController::class, 'changeStatus'])->name('bookings.changeStatus');

});

Route::get('admin/bookings', [BookingController::class, 'admin_bookings'])->middleware(['auth','admin'])->name('bookings.admin');

Route::get('/reviews/create', [ReviewController::class,'create'])->middleware('auth')->name('review.create');
Route::post('/reviews/save', [ReviewController::class,'store'])->middleware('auth')->name('review.store');
Route::get('/process-payment/{product}', [BookingController::class, 'processPaymentView'])->middleware('auth','role:user')->name('process.payment');

Route::get('/get_categories', [CategoryController::class, 'getCategories'])->name('get_categories');
Route::get('/get-items-by-category', [CategoryController::class, 'getItemsByCategory'])->name('get_items_by_category');
Route::get('/filtered-items', [CategoryController::class, 'filteredItems'])->name('filtered_items');
Route::get('/ask/rent', [BookingController::class, 'booking_renter'])->name('ask_rent');
