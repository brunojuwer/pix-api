<?php

use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\KeysController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/institutions', InstitutionsController::class);
Route::apiResource('/keys', KeysController::class);