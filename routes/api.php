<?php

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\TransientTokenController;
use Illuminate\Support\Facades\Route;

// Rutas principales de Passport
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
Route::get('/oauth/authorize', [AuthorizationController::class, 'authorize']);
Route::post('/oauth/token/refresh', [TransientTokenController::class, 'refresh']);
