<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    'comment', 'board_user_id', 'post_user_id' 
    ];
}
