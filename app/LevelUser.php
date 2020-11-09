<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    protected $fillable = [
        'level_id', 'user_id'
    ];
}
