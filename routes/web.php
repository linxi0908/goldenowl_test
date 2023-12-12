<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [ProductController::class, 'index']);
Route::get('add_to_cart/{productId}',[CartController::class,'addToCart'])->name('add_to_cart');
Route::get('delete_item_in_cart/{productId}', [CartController::class, 'deleteItem'])->name('delete_item_in_cart');
Route::get('update_item_in_cart/{productId}/{qty?}', [CartController::class, 'updateItem'])->name('update_item_in_cart');
Route::get('/get_products', [ProductController::class, 'getData']);
