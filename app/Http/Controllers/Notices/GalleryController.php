<?php

namespace App\Http\Controllers\Notices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Notices\Infrastructure\Repositories\GalleryRepository;

class GalleryController extends Controller
{

    private $_galleryRepository;

    public function __construct()
    {
        $this->_galleryRepository = new GalleryRepository();

    }

    public function uploadImages(Request $request)
    {
        return $this->_galleryRepository->uploadImages($request);
    }

    public function showGallery()
    {
        return $this->_galleryRepository->showGallery();
    }

}
