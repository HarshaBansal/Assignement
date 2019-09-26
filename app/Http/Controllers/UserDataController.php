<?php

namespace App\Http\Controllers;

use App\Rules\CardRequestRule;
use App\Services\UserDataService;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    
    /**
     * @var \App\Services\UserDataService
     */
    private $service;
    
    /**
     * UserDataController constructor.
     *
     * @param \App\Services\UserDataService $service
     */
    public function __construct(UserDataService $service)
    {
        $this->service = $service;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            ['name' => 'required']
        );
        
        //Store the data of the user
        $user = User::firstOrCreate(['name' => $request->name]);
        
        return response()->json([
            'redirect' => route('user-cards') . '/' . $user->id,
        ], 200);
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userCardsData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_cards' => new CardRequestRule(),
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "error" => [
                    'The Card Values Should be from the set of cards. Please Enter Again',
                ],
            ], 400);
        }
        
        //to store the user hand cards
        $userId = $this->service->store($request);
        
        return response()->json([
            'redirect' => route('api.generate-cards') . '/' . $userId,
        ], 200);
    }
}
