<?php

namespace Src\Notices\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeGallery extends Model
{

    protected $table = 'notices__gallery';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'notice_category_id',
        'url',
        'created_at',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne(Role::class, 'id', 'notice_category_id');
    }

}
