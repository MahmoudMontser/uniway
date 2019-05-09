<?php

namespace App\Http\Controllers\User;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{

    public function register(Request $request){
        $validator=Validator::make($request->all(),[

            'email'=>'required|email',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'age'=>'required',
            'name'=>'required',
            'national_id' => 'required|digits:14'
        ]);
        if ($validator->passes()){
            $user= new User();
            $user->email=$request['email'];
            $user->name=$request['name'];
            $user->age=$request['age'];
            $user->password=bcrypt($request['password']);
            $user->phone=$request['phone'];
            $user->national_id=$request['national_id'];
            $user->save();
            return'hello new user';
        }else return ['msg'=>$validator->errors()];


    }
    public function create_profile_page(){


        return view('user.profile');

    }
}
