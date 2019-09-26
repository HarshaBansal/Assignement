<?php

namespace App\Http\Controllers;

use App\Services\StoreUserScoreService;
use App\UserGameModel;
use App\UserHandCard;
use Illuminate\Http\Request;

class GenerateSystemCardsController extends Controller
{
    /**
     * @var array
     */
    private $cardsArray =
        ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    
    /**
     * @param $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function displaySystemCards($user)
    {
        $userHand = UserHandCard::where('user_id', $user)->first();
        $userCards = cards($userHand->config_cards);
        
        //genetate the computer cards
        $generateCards = collect($this->cards(count($userCards)));
        
        return view('generate_card', compact('generateCards', 'userHand'));
    }
    
    /**
     * @param $userHandCards
     *
     * @return array
     */
    public function cards($userHandCards)
    {
        //generate random cards to view as computer cards
        $generateCards = [];
        
        $cards = collect($this->cardsArray);
        
        for ($i = 0; $i < $userHandCards; $i++) {
            $generateCards[] = $cards->random();
        }
        
        return $generateCards;
    }
}
