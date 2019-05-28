<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function rate(Request $request){

        $validator = Validator::make($request->all(), [
            'trip_id' => 'exists:places,id',
            'rate'=>'max:5',
            'user_id' => 'exists:users,id',

        ]);
        $target=User::wherId($request['user_id']);
        if ($validator->passes()){
            $rate=new Rating();
            $rate->user_id=$request['user_id'];
            $rate->trip_id=$request['trip_id'];
            $rate->rate=$request['rate'];
            $rate->save();
            return response()->json(['value' => true, 'msg' => 'rated successfully', 'data' => ['place' => $target->name, 'rate' => $rate->rate]]);
        } else return response()->json(['value' => false, 'msg' => $validator->errors()]);

    }
}
