<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'description', 'level_id', 'slug', 'order', 'syllabus', 'file'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
