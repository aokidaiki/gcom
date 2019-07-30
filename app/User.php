<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;


class User extends Authenticatable
{
    use Notifiable;
    use CanFollow, CanBeFollowed;
    
    protected $fillable = [
        'id', 'name', 'email', 'password','comment', 'gamelist',
        'games_id', 'icon_image', 'background_image', 'twitter_url',
        'board_name', 'board_comment', 
    ];
    
    public function comment(){
        return $this->hasMany(\App\Comment::class);
    }
    
}
