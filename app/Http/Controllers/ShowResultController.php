<?php

namespace App\Http\Controllers;

use App\Services\ShowResultService;
use App\User;
use App\UserGameModel;
use App\UserHandCard;
use Illuminate\Http\Request;
use DB;

class ShowResultController extends Controller
{
    /**
     * @var \App\Services\ShowResultService
     */
    private $service;
    
    /**construct
     * ShowResultController constructor.
     *
     * @param \App\Services\ShowResultService $service
     */
    public function __construct(ShowResultService $service)
    {
        $this->service = $service;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function getData(Request $request)
    {
        $userId = $request->input('user_id');
        $computerCard = cards($request->input('computer_card'));
        
        //to get the user wise game details and result of the current user
        list($userCard, $userGameData, $userScore, $computerScore, $userData) =
            $this->service->resultData($userId);
        
        return view('user_details',
            compact('userData', 'computerCard', 'userCard', 'userScore',
                'computerScore', 'userGameData'));
    }
}
