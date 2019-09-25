<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGameModel extends Model
{
    
    protected $table = "user_game";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_score',
        'system_score',
        'win',
    ];
}
