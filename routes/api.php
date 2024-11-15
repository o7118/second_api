<?php

use App\Http\Controllers\registrationcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registration', [registrationcontroller::class, 'safe']);