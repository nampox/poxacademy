<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::post('/chat', [ChatController::class, 'handleChat'])->name('chat.api');
