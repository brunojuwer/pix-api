<?php

use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\InstitutionAuthController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\KeysController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/institutions', InstitutionsController::class)
    ->middleware('auth:sanctum')
    ->except('store');

Route::post('/institutions', [InstitutionsController::class, 'store']);

Route::apiResource('/keys', KeysController::class);

Route::apiResource('/institutions/token', ApiKeyController::class)
    ->middleware('auth:sanctum');

Route::post('/login', [InstitutionAuthController::class, 'login']);
