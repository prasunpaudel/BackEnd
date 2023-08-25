<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SiteController;
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
Route::get('/esewa', [SiteController::class, 'getSewa'])->name('getSewa');
Route::get('/esewa/success', function(){
	dd('payment success');
});

Route::get('/esewa/fail', function(){
	dd('payment fail');
});


Route::get('/', [SiteController::class, 'getSite'])->name('getSite');
Route::get('/shopping', [SiteController::class, 'shopping'])->name('shopping');
Route::get('/cart/{product}', [SiteController::class, 'getAddCart'])->name('getAddCart');
Route::get('/carts', [SiteController::class, 'getCart'])->name('getCart');
Route::get('/carts/delete/{cart}', [SiteController::class, 'getdeletecart'])->name('getdeletecart');
Route::get('/checkout', [SiteController::class, 'checkout'])->name('checkout');
Route::post('/PostCheckout', [SiteController::class, 'PostCheckout'])->name('PostCheckout');
Route::get('/Billing', [SiteController::class, 'Billing'])->name('Billing');

Route::get('/catagory', [CatagoryController::class, 'getAddCatagory'])->name('catagory');
Route::post('/postAddCatagory',[CatagoryController::class,'postAddCatagory'])->name('postAddCatagory');

Route::get('/manage/catagory', [CatagoryController::class, 'getmanageCatagory'])->name('getmanagecatagory');
Route::get('/manage/catagory/delete/{catagory}', [CatagoryController::class, 'getdeleteCatagory'])->name('getdeletecatagory');
Route::get('/manage/catagory/edit/{catagory}', [CatagoryController::class, 'geteditCatagory'])->name('geteditcatagory');
Route::post('/manage/catagory/edit/{catagory}', [CatagoryController::class, 'posteditCatagory'])->name('posteditcatagory');


Route::get('/getAddGallery',[GalleryController::class,'getAddGallery'])->name('getAddGallery');
Route::post('/postAddGallery',[GalleryController::class,'postAddGallery'])->name('postAddGallery');
Route::get('/manage/gallery',[GalleryController::class,'getmanagegallery'])->name('getmanagegallery');
Route::get('/manage/gallery/delete/{gallery}', [GalleryController::class, 'getdeletegallery'])->name('getdeletegallery');
Route::get('/manage/gallery/edit/{gallery}', [GalleryController::class, 'geteditgallery'])->name('geteditgallery');
Route::post('/manage/gallery/edit/{gallery}', [GalleryController::class, 'posteditgallery'])->name('posteditgallery');

Route::get('/getAddProduct',[ProductController::class,'getAddProduct'])->name('getAddProduct');
Route::post('/postAddProduct',[ProductController::class,'postAddProduct'])->name('postAddProduct');
Route::get('/manage/product', [productController::class, 'getmanageproduct'])->name('getmanageproduct');
Route::get('/manage/product/delete/{product}', [productController::class, 'getdeleteproduct'])->name('getdeleteproduct');
Route::get('/manage/product/edit/{product}', [productController::class, 'geteditproduct'])->name('geteditproduct');
Route::post('/manage/product/edit/{product}', [productController::class, 'posteditproduct'])->name('posteditproduct');

Route::get('/getsocialmedia',[SocialmediaController::class,'getsocialmedia'])->name('getsocialmedia');
Route::post('/postsocialmedia',[SocialmediaController::class,'postsocialmedia'])->name('postsocialmedia');
Route::get('/manage/socialmedia',[SocialmediaController::class,'getmanagesocialmedia'])->name('getmanagesocialmedia');
Route::get('/manage/media/delete/{socialmedia}', [SocialmediaController::class, 'getdeletemedia'])->name('getdeletemedia');
Route::get('/manage/media/edit/{socialmedia}', [SocialmediaController::class, 'geteditmedia'])->name('geteditmedia');
Route::post('/manage/media/edit/{socialmedia}', [SocialmediaController::class, 'posteditmedia'])->name('posteditmedia');

Route::get('/shipping',[ShippingController::class,'AddShipping'])->name('AddShipping');
Route::post('/postshipping',[ShippingController::class,'PostAddShipping'])->name('PostAddShipping');
Route::get('/manage/shipping',[ShippingController::class,'ManageShipping'])->name('ManageShipping');
Route::get('/manage/shipping/delete/{shipping}', [ShippingController::class, 'DeleteShipping'])->name('DeleteShipping');
Route::get('/manage/shipping/edit/{shipping}', [ShippingController::class, 'EditShipping'])->name('EditShipping');
Route::post('/manage/shipping/edit/{shipping}', [ShippingController::class, 'PostEditShipping'])->name('PostEditShipping');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');

});

