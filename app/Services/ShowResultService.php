<?php

namespace App\Services;

use App\UserGameModel;
use App\UserHandCard;

class ShowResultService
{
    /**
     * @param $userId
     *
     * @return array
     */
    public function resultData($userId): array
    {
        $userHandCard =
            UserHandCard::where('user_id', $userId)->first()->config_cards;
        $userCard = collect($userHandCard);
        
        $userGameData =
            UserGameModel::where('user_id', $userId)->latest()->first();
        
        //Score of the user and Computer
        $userScore = $userGameData->user_score;
        $computerScore = $userGameData->system_score;
        
        //This is to display the dashboard data
        $userData = UserGameModel::join('users', 'users.id',
            'user_game.user_id')->select([
            'users.name',
            'users.id',
            DB::raw('SUM(win) as wins'),
        ])->selectRaw('count("user_id") as games')
                                 ->groupBy('users.id')
                                 ->get();
        
        return [
            $userCard,
            $userGameData,
            $userScore,
            $computerScore,
            $userData,
        ];
    }
}
