<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/blog/posts', [\App\Http\Controllers\Api\Blog\PostController::class, 'index']);
Route::get('/blog/posts/{id}', [\App\Http\Controllers\Api\Blog\PostController::class, 'details']);
Route::delete('/blog/posts/delete/{id}', [\App\Http\Controllers\Api\Blog\PostController::class, 'delete']);

Route::get('/blog/categories', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'index']);
Route::get('/blog/categories/{id}', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'details']);
Route::delete('/blog/categories/delete/{id}', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'delete']);
