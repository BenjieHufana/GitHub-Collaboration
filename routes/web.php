<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', function(){ return view('welcome'); });

Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);

