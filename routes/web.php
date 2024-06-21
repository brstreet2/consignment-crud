<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

Route::resource('banner', App\Http\Controllers\CMS\BannerController::class);

Route::resource('top-up', App\Http\Controllers\CMS\ProductController::class);

// Route::group(['prefix' => 'banner'], function () {
//     Route::get('', [App\Http\Controllers\CMS\BannerController::class, 'index'])->name('banner.index');
//     Route::post('/create', [App\Http\Controllers\CMS\BannerController::class, 'create'])->name('banner.create');
//     Route::get('/read/{id}', [App\Http\Controllers\CMS\BannerController::class, 'read'])->name('banner.read');
//     Route::put('/update/{id}', [App\Http\Controllers\CMS\BannerController::class, 'update'])->name('banner.update');
//     Route::delete('/delete/{id}', [App\Http\Controllers\CMS\BannerController::class, 'delete'])->name('banner.delete');
// });
