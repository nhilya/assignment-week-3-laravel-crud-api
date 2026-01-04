<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/**
 * Routes for Login and Logout
 */
Route::post('login', [AuthController::class, 'login']);

/**
 * Protected routes
 */
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
/**
 * API Routes to ProductController
 */
Route::get('products', [ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'store']);
Route::put('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);
