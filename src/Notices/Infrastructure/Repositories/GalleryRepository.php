<?php

namespace Src\Notices\Infrastructure\Repositories;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Src\Notices\Infrastructure\Models\NoticeGallery;

class GalleryRepository
{

    public function showGallery()
    {
        $images = NoticeGallery::where('created_by', auth()->id())->orderBy("id", "DESC")->paginate(10);

        return response()->json($images, 200);
    }

    public function deleteImages($id)
    {

        try {
            $image = NoticeGallery::find($id);
            $route = $image->url;
            $category = $image->category->name;
            $image->delete();
            //$OldImage = '/home/jasrdesa/public_html/assets/gallery/' . $category . '/' .$route; // Production
            $OldImage = public_path() . 'assets/gallery/' . $category . '/' . $route;
            unlink($OldImage);
        } catch (\Throwable$th) {
            //throw $th;
        }

    }

    public function uploadImages(Request $request)
    {
        try {
            $file = $request->file('file0');
            //$category = $request->category;
            $category = 'default';
            $now = Carbon::now()->format('dmYhis');
            //$counter = 0;
            //foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            if ($ext === 'jpeg' | $ext === 'jpg' | $ext === 'png' |
                $ext === 'JPEG' | $ext === 'JPG' | $ext === 'PNG') {
                $file->move('assets/gallery/' . $category . '/', $name);
                rename('assets/gallery/' . $category . '/' . $name, 'assets/gallery/' . $category . '/' . $now . /*$counter .*/'.' . $ext);
                $NewImage['notice_category_id'] = 1;
                $NewImage['url'] = $now/*. $counter*/ . '.' . $ext;
                $NewImage['created_by'] = auth()->id();
                NoticeGallery::create($NewImage);
                //$counter++;
            }
            // }

            return response()->json($NewImage['url'], 200);
        } catch (\Throwable$th) {
            Log::debug($th);

            return false;
        }

    }
}
