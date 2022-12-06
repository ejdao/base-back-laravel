<?php

namespace Src\Notices\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{

    protected $table = 'notices';

    protected $fillable = [
        'id',
        'principal_image_url',
        'description',
        'notice_content_id',
        'notice_category_id',
        'published',
        'visits',
        'location',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public function content()
    {
        return $this->hasOne(Role::class, 'id', 'notice_content_id');
    }

    public function category()
    {
        return $this->hasOne(Role::class, 'id', 'notice_category_id');
    }

}
