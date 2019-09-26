<?php

namespace App\Services;

use App\UserGameModel;
use App\UserHandCard;
use Illuminate\Http\Request;

class StoreUserScoreService
{
    /**
     * @var array
     */
    private $cardsArray =
        ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function userScoreData(Request $request)
    {
        $computerCards = explode(' ', $request->input('computer_cards'));
        $userId = $request->input('user_id');
        $userHandData = UserHandCard::where('user_id', $userId)->first();
        $userHandCardData = explode(' ', $userHandData->config_cards);
        
        //To get the winner based on the user and computer hand cards.
        $winner =
            $this->getValue($userHandCardData, $computerCards);
        
        $userScore = $winner['user_count'];
        $computerScore = $winner['computer_count'];
        
        //Storing the User Game Wise Score
        UserGameModel::create([
            'user_id'      => $userId,
            'user_score'   => $userScore,
            'system_score' => $computerScore,
            'win'          => $userScore > $computerScore ? 1 : 0,
        ]);
        
        return [
            'user_id' => $userId,
        ];
    }
    
    /**
     * @param array $userHandCardData
     * @param array $systemHandCards
     *
     * @return array
     */
    public function getValue(
        array $userHandCardData,
        array $systemHandCards
    ) {
        $userCount = 0;
        $generatedCount = 0;
        
        //to get the score of user and computer
        for ($i = 0; $i < sizeof($userHandCardData); $i++) {
            $userValue = array_search($userHandCardData[$i], $this->cardsArray);
            $generatedValue =
                array_search($systemHandCards[$i], $this->cardsArray);
            
            if ($userValue > $generatedValue) {
                $userCount++;
            } else {
                $generatedCount++;
            }
        }
        
        return [
            'user_count'     => $userCount,
            'computer_count' => $generatedCount,
        ];
    }
}
