<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = [
    'games_title'
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
