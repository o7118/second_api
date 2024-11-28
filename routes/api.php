<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registrationcontroller;
use App\Http\Controllers\socialcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/auth/google/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialController::class, 'callback'])->name('google.callback');

// For API (Postman-friendly):
Route::post('/auth/google/token', [SocialController::class, 'handleGoogleToken'])->name('google.token');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registration', [registrationcontroller::class, 'safe']);
Route::post('/login', [logincontroller::class, 'login']);
Route::get('/auth/facebook', [socialcontroller::class, 'redirect'])->name('facebook.redirect');