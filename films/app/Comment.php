<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['namefilm', 'year', 'totalpeople', 'rating'];
    protected $table = 'comments';
}
