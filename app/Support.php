<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'name', 'description', 'type_support_id', 'file', 'lesson_id', 'order'
    ];

    public function type()
    {
        return $this->belongsTo(TypeSupport::class, 'type_support_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
