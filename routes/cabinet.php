<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cabinet\ExampleController;
use App\Http\Controllers\Cabinet\IndexController;
use App\Http\Controllers\Cabinet\ProfileController;
use App\Http\Controllers\Cabinet\SettingsController;
use Illuminate\Support\Facades\Route;

/**
 * Cabinet area / Кабинет / ЛК
 * http://l9stk.loc/cabinet
 */
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/**
 * Настройки юзера
 */
Route::group([
], static function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
});

/**
 * Example module (placeholder for new features)
 */
Route::group([
], static function () {
    Route::get('/example', [ExampleController::class, 'index'])->name('example');
});
