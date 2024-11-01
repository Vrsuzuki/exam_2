<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::middleware('auth')->group(function () {
        Route::get('/', [ContactController::class, 'index']);
    });

// Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/edit', [ContactController::class, 'backToForm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::post('/back', [ContactController::class, 'backToHome']);

Route::get('/admin', [ContactController::class, 'admin']);
Route::get('/admin/search', [ContactController::class, 'search']);
Route::get('/admin/reset', [ContactController::class, 'reset']);



