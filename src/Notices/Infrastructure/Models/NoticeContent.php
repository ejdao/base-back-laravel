<?php

namespace Src\Notices\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeContent extends Model
{

    protected $table = 'notices__contents';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'content',
    ];
}
