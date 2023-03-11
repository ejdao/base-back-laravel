<?php

namespace Src\Notices\Infrastructure\Repositories;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Src\Notices\Infrastructure\Models\Notice;
use Src\Notices\Infrastructure\Models\NoticeContent;

class NoticeRepository
{

    public function create(Request $request)
    {
        $newContent["content"] = $request->content;

        $newNotice['principal_image_url'] = $request->imageUrl;
        $newNotice['description'] = $request->description;
        $newNotice['notice_category_id'] = $request->categoryId;
        $newNotice['published'] = true;
        $newNotice['location'] = $request->location;
        $newNotice['created_by'] = auth()->id();
        DB::beginTransaction();
        try {
            $content = NoticeContent::create($newContent);

            $newNotice['notice_content_id'] = $content->id;

            $notice = Notice::create($newNotice);
            DB::commit();
            return $notice;
        } catch (Exception $ex) {
            Log::debug($ex);
            DB::rollBack();
            return false;
        }
    }
}
