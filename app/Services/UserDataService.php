<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

class UserDataService
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array|string|null
     */
    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        
        DB::table('users_hand_cards')
          ->updateOrInsert(['user_id' => $userId,], [
              'config_cards' => strtoupper($request->input('user_cards')),
              'created_at'   => now(),
              'updated_at'   => now(),
          ]);
        
        return $userId;
    }
}
