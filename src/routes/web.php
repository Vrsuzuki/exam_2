<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;



Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/edit', [ContactController::class, 'backToForm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::post('/back', [ContactController::class, 'backToHome']);