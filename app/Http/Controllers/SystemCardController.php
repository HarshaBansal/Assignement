<?php

namespace App\Http\Controllers;

use App\UserGameModel;
use App\UserHandCard;
use Illuminate\Http\Request;

class SystemCardController extends Controller
{
    
    /**
     * @var array
     */
    private $cardsArray =
        ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @param $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function systemCards(Request $request, $user)
    {
        $userHand = UserHandCard::where('user_id', $user)->first();
        $userCards = explode(' ', $userHand->config_cards);
        $systemCards = collect($this->displaySystemCards(count($userCards)));
        
        return view('system_card', compact('systemCards', 'userHand'));
    }
    
    /**
     * @param $userHandCards
     *
     * @return array
     */
    public function displaySystemCards($userHandCards)
    {
        $systemCards = [];
        
        $cards = collect($this->cardsArray);
        
        for ($i = 0; $i < $userHandCards; $i++) {
            $systemCards[] = $cards->random();
        }
        
        return $systemCards;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSystemCards(Request $request)
    {
        $systemHandCards = explode(' ', $request->input('system_cards_data'));
        $userId = $request->input('user_id');
        
        $userHandData = UserHandCard::where('user_id', $userId)->first();
        
        $userHandCardData = explode(' ', $userHandData->config_cards);
        
        $winner =
            $this->getValue($userHandCardData, $systemHandCards);
        
        $user = $winner['user'];
        $system = $winner['system'];
        
        UserGameModel::create([
            'user_id'      => $userId,
            'user_score'   => $user,
            'system_score' => $system,
            'win'          => $user > $system ? 1 : 0,
        ]);
        
        return response()->json([
            'redirect' => route('show-data',
                [
                    'user_id'     => $userId,
                    'system_card' => $request->input('system_cards_data'),
                ]),
        ]);
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
        
        return ['user' => $userCount, 'system' => $generatedCount];
    }
}
