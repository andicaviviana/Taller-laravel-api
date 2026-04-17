<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;

Route::apiResource('books', BookController::class);
Route::apiResource('categories', CategoryController::class);
Route::get('categories-active', [CategoryController::class, 'activeWithBooks']);


