<?php

use App\Http\Controllers\Api\GetCategoriesController;
use App\Http\Controllers\Api\GetTourPagesController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPresetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::get('tour-pages', GetTourPagesController::class);
    Route::get('categories', GetCategoriesController::class);
    Route::get('products/{product}', [ProductController::class, 'show']);
    Route::get('products/{product}/presets', [ProductPresetController::class, 'index']);
});
