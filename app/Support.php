<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'name', 'description', 'type_support_id', 'file', 'lesson_id', 'order'
    ];
}
