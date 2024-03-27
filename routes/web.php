<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return Usuario::with('roles')->find(2);
});

Route::resource('/products', ProductController::class);
