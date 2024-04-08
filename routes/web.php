<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return 'Welcome';
});

Route::resource('/products', ProductController::class);
