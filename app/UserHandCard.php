<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserHandCard extends Model
{
    use Notifiable;
    
    /**
     * @var string
     */
    protected $table = 'users_hand_cards';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'config',
    ];
}
