<?php

use Illuminate\Support\Facades\Route;

//Route::get('v1/users', [App\Http\Controllers\Security\UserController::class, 'getAll']);
//Route::get('v1/users/{id}', [App\Http\Controllers\Security\UserController::class, 'getOne']);

Route::group(['middleware' => ['auth']], function () {
    //Route::post('v1/users', [App\Http\Controllers\Security\UserController::class, 'create']);
    //Route::put('v1/users/{id}', [App\Http\Controllers\Security\UserController::class, 'update']);
    //Route::delete('v1/users/{id}', [App\Http\Controllers\Security\UserController::class, 'deleteOne']);
});
