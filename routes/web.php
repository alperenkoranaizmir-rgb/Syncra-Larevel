<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Admin routes group using admin middleware
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', function () { return view('vendor.adminlte.dashboard.index'); });
    Route::get('/users', function () { return 'Users list (protected)'; });
});
