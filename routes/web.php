<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
});
Route::post('/login', [LoginController::class, 'loginApi'])->name('login.api');
Route::post('/sigUpApi', [LoginController::class, 'sigUpApi'])->name('sigup.api');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

