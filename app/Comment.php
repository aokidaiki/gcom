<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = [
    'comment', 'board_user_id', 'post_user_id' 
    ];

    public function board_user(){
        return $this->belongsTo(\App\User::class,'board_user_id');
    }    
    
    public function post_user(){
        return $this->belongsTo(\App\User::class,'post_user_id');
    }
}
