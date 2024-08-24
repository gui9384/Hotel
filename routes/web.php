<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/',[UserController::class,'Index']);

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/profile',[UserController::class,'UserProfile'])->name('user.profile');
    Route::get('/logout',[UserController::class,'UserLogout'])->name('user.logout');
}); 
require __DIR__.'/auth.php';
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminUpdatePassword'])->name('admin.password.update');
}); 
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');
