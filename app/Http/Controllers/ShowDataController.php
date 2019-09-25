<?php

namespace App\Http\Controllers;

use App\User;
use App\UserGameModel;
use App\UserHandCard;
use Illuminate\Http\Request;
use DB;

class ShowDataController extends Controller
{
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function getData(Request $request)
    {
        
        $userId = $request->input('user_id');
        $systemCard = collect($request->input('system_card'));
        $userHandCard =
            UserHandCard::where('user_id', $userId)->first()->config_cards;
        $userCard = collect($userHandCard);
        
        $score = UserGameModel::where('user_id', $userId)->latest()->first();
        
        $userScore = $score->user_score;
        $systemScore = $score->system_score;
        
        
        $userData = UserGameModel::join('users', 'users.id',
            'user_game.user_id')->select([
            'users.name',
            'users.id',
            DB::raw('SUM(win) as wins'),
        ])->selectRaw('count("user_id") as games')
                                 ->groupBy('users.id')
                                 ->get();
        
        return view('data',
            compact('userData', 'systemCard', 'userCard', 'userScore',
                'systemScore', 'score'));
    }
}
