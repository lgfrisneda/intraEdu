<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name', 'description', 'slug', 'course_id', 'order'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
