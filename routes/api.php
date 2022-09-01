<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GetCategoriesController;
use App\Http\Controllers\Api\GetTourPagesController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPresetController;
use App\Http\Controllers\Api\VaultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetVaultController;

Route::middleware("auth:sanctum")->get("v1/user", function (Request $request) {
    return $request->user();
});

Route::middleware("auth:sanctum")
    ->prefix("v1")
    ->group(function () {
        Route::get("vaults", GetVaultController::class);
        Route::get("vaults/{vault}", [VaultController::class, "show"])->name(
            "vaults.show"
        );
    });

Route::prefix("v1")->group(function () {
    Route::post("user/register", [AuthController::class, "register"]);
    Route::post("user/login", [AuthController::class, "Login"]);
    Route::get("tour-pages", GetTourPagesController::class);
    Route::get("categories", GetCategoriesController::class);
    Route::get("products/{product}", [ProductController::class, "show"]);
    Route::get("products/{product}/presets", [
        ProductPresetController::class,
        "index",
    ]);
});
