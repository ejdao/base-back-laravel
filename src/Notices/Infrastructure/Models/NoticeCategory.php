<?php

namespace Src\Notices\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeCategory extends Model
{
    protected $table = 'notices__category';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
    ];
}
