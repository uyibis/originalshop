<?php

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

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/cart',[\App\Http\Controllers\CartControler::class,'store'])->name('cart');
Route::get('/currency',[\App\Http\Controllers\CurrencyController::class,'index'])->name('currency');
Route::post('/wallet',[\App\Http\Controllers\WalletController::class,'store'])->name('wallet');
Route::get('/wallet',[\App\Http\Controllers\WalletController::class,'index'])->name('wallet');
Route::post('/payment',[\App\Http\Controllers\PaymentController::class,'store'])->name('payment');
Route::get('sendmail',[\App\Http\Controllers\SendEmailController::class,'index'])->name('sendmail');
Route::get('sendmail/apitest',[\App\Http\Controllers\SendEmailController::class,'apitest'])->name('apitest');
Route::get('product_a/{item}',[\App\Http\Controllers\HomeController::class,'product'])->name('homeproduct');
Route::get('product_list_a',[\App\Http\Controllers\HomeController::class,'productlist'])->name('homeproductlist');
Route::get('categories_list_a',[\App\Http\Controllers\HomeController::class,'categorieslist'])->name('homecategorieslist');
Route::get('category_a/{item}',[\App\Http\Controllers\HomeController::class,'categories'])->name('homecategorieslist');
Route::post('updatecat',[\App\Http\Controllers\HomeController::class,'categorySave'])->name('updatecat');
Route::post('uploads',[\App\Http\Controllers\UploaderController::class,'upload'])->name('uploads');
