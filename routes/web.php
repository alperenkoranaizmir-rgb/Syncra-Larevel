<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

// Authentication
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('password/forgot', [AuthController::class, 'showForgot'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendReset'])->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showReset'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes group using admin middleware
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', function () { return view('vendor.adminlte.dashboard.index'); });
    // Admin users management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class, ['as' => 'admin']);
    // Calendar
    Route::get('calendar', [App\Http\Controllers\Admin\CalendarController::class, 'index'])->name('admin.calendar.index');
    Route::get('calendar/events', [App\Http\Controllers\Admin\CalendarController::class, 'events'])->name('admin.calendar.events');
    Route::post('calendar/events', [App\Http\Controllers\Admin\CalendarController::class, 'store'])->name('admin.calendar.events.store');
    Route::get('calendar/events/{id}', [App\Http\Controllers\Admin\CalendarController::class, 'show'])->name('admin.calendar.events.show');
    Route::put('calendar/events/{id}', [App\Http\Controllers\Admin\CalendarController::class, 'update'])->name('admin.calendar.events.update');
    Route::delete('calendar/events/{id}', [App\Http\Controllers\Admin\CalendarController::class, 'destroy'])->name('admin.calendar.events.destroy');

    // Roles search for Select2 AJAX
    Route::get('roles/search', [App\Http\Controllers\Admin\RoleController::class, 'search'])->name('admin.roles.search');
    // User roles for preselection
    Route::get('users/{user}/roles', [App\Http\Controllers\Admin\RoleController::class, 'userRoles'])->name('admin.users.roles');
    // Create role (ajax)
    Route::post('roles', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.roles.store');
});
