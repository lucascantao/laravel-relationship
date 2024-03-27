<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;

Route::get('/', function () {
    return Usuario::with('roles')->find(2);
});
