<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use app\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/product', [ProductController::class, 'store']);
});

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/login', [AuthController::class, 'getToken']);