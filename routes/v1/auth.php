<?php

use Illuminate\Support\Facades\Route;

Route::post('v1/login', [Src\Auth\Presentation\Controllers\LoginController::class, 'login']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('v1/refresh', [Src\Auth\Presentation\Controllers\LoginController::class, 'refresh']);
    Route::get('v1/logout', [Src\Auth\Presentation\Controllers\LoginController::class, 'logout']);
});
