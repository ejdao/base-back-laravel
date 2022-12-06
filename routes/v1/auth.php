<?php

use Illuminate\Support\Facades\Route;

Route::post('v1/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('v1/refresh', [App\Http\Controllers\Auth\LoginController::class, 'refresh']);
    Route::get('v1/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
});
