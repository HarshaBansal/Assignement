<?php

namespace App\Http\Controllers;

use App\User;
use App\UserHandCard;
use Illuminate\Http\Request;
use DB;

class UserDataController extends Controller
{
    
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
            ['name' => 'required|string']
        );
        
        $user = User::firstOrCreate(['name' => $request->name]);
        
        return response()->json([
            'redirect' => route('cards') . '/' . $user->id,
        ], 200);
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCardsData(Request $request)
    {
        
        $cardsArray =
            ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        
        $userId = $request->input('user_id');
        $userCardsData = explode(' ', $request->input('user_cards_data'));
        
        $result = count(array_intersect($userCardsData, $cardsArray))
            == count($userCardsData);
        
        if ($result) {
            
            DB::table('users_hand_cards')
              ->updateOrInsert(['user_id' => $userId,], [
                  'config_cards' => $request->input('user_cards_data'),
                  'created_at'   => now(),
                  'updated_at'   => now(),
              ]);
            
            return response()->json([
                'redirect' => route('api.system-cards') . '/' . $userId,
            ], 200);
        } else {
            return response()->json([
                "error" => [
                    'The Card Values Should be from the set of cards. Please Enter Again',
                ],
            ], 400);
        }
    }
}
