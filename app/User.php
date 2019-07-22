<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'id', 'name', 'email', 'password','comment', 'gamelist',
        'games_id', 'icom image', 'background_image', 'twitter_url',
        'board_name', 'board_comment', 
    ];
    public function games()
    {
        return $this->hasMany('App\Games');
    }
}
