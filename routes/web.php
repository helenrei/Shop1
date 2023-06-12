<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'showProductSelection'])->name('product.selection');
Route::post('/cart/add/{productId}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductController::class, 'showCart'])->name('cart');
Route::put('/cart/update/{cartItemId}', [ProductController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/delete/{cartItemId}', [ProductController::class, 'deleteCartItem'])->name('cart.delete');
Route::get('/payment', [ProductController::class, 'showPayment'])->name('payment');
Route::post('/payment/process', [ProductController::class, 'processPayment'])->name('payment.process');

?>
