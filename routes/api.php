<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/**
 * API Routes for Register, Login, Logout, and Me
 */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');

/**
 * API Routes to ProductController
 */
Route::get('products', [ProductController::class, 'index'])->middleware('auth:sanctum');
Route::get('product/{id}', [ProductController::class, 'show'])->middleware('auth:sanctum');
Route::post('product', [ProductController::class, 'store'])->middleware('auth:sanctum');
Route::put('product/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum');
