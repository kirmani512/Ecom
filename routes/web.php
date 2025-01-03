<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[HomeController::class,'home']);

Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders',[HomeController::class,'myorders'])->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);

Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware('auth', 'admin');

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware('auth', 'admin');

Route::get('add_product', [AdminController::class, 'add_product'])->middleware('auth', 'admin');

Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware('auth', 'admin');
Route::get('view_product',[AdminController::class,'view_product'])->middleware('auth','admin');
Route::get('delete_poduct/{id}',[AdminController::class,'delete_poduct'])->middleware('auth','admin');
Route::get('update_product/{slug}',[AdminController::class,'update_product'])->middleware('auth','admin');

Route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware('auth','admin');

Route::get('product_search',[AdminController::class,'product_search'])->middleware('auth','admin');

Route::get('/', [HomeController::class, 'home']);

ROute::get('product_details/{id}',[HomeController::class,'product_details']);

ROute::get('shop',[HomeController::class,'shop']);

ROute::get('why',[HomeController::class,'whyus']);

ROute::get('contact',[HomeController::class,'contact']);

ROute::get('add_cart/{id}',[CartController::class,'add_cart'])->middleware('auth','verified');

ROute::get('mycart',[CartController::class,'mycart'])->middleware('auth','verified');

ROute::get('remove_cart/{id}',[CartController::class,'remove_cart'])->middleware('auth','verified');

Route::post('/update_cart/{id}', [CartController::class, 'update_cart_quantity'])->middleware('auth','verified');

Route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware('auth','verified');

Route::get('view_orders',[AdminController::class,'view_orders'])->middleware('auth','admin');

Route::get('in_transit/{id}',[AdminController::class,'in_transit'])->middleware('auth','admin');

Route::get('deliver/{id}',[AdminController::class,'deliver'])->middleware('auth','admin');

Route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware('auth','admin');

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}','stripe');
    Route::post('stripe/{value}','stripePost')->name('stripe.post');
});
