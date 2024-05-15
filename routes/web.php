<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product-import',[ProductController::class,'index'])->name('products.import');

Route::post('/import', [ProductController::class, 'import'])->name('import');
