<?php

namespace App\Http\Controllers;

use App\Services\StoreUserScoreService;
use App\UserGameModel;
use Illuminate\Http\Request;

class StoreUserScoreController extends Controller
{
    /**
     * @var \App\Services\StoreUserScoreService
     */
    private $service;
    
    /**
     * GenerateSystemCardsController constructor.
     *
     * @param \App\Services\StoreUserScoreService $service
     */
    public function __construct(StoreUserScoreService $service)
    {
        $this->service = $service;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeUserScore(Request $request)
    {
        //To store the user game wise score and computer score.
        $resultData = $this->service->userScoreData($request);
        $userId = $resultData['user_id'];
        
        return response()->json([
            'redirect' => route('show-result',
                [
                    'user_id'       => $userId,
                    'computer_card' => $request->input('computer_cards'),
                ]),
        ]);
    }
}
