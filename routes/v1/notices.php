<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::post('v1/notices/gallery/images', [App\Http\Controllers\Notices\GalleryController::class, 'uploadImages']);
    Route::get('v1/notices/gallery/images', [App\Http\Controllers\Notices\GalleryController::class, 'showGallery']);
    Route::post('v1/notices', [App\Http\Controllers\Notices\NoticeController::class, 'create']);
});
