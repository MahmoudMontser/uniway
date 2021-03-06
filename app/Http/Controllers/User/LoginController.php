<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Socialite;

class LoginController extends Controller
{
  public function login(Request $request){

      $validator=Validator::make($request->all(),[
          'phone'=>'exists:users,phone|regex:/(01)[0-9]{9}/',
          'password'=>'required'
      ]);

      if($validator){
         $cardinalities=$request->only('phone','password');
         if (Auth::attempt($cardinalities)){
             $user=Auth::user();
             return redirect()->route('home_page')->with(notify()->flash($user->name,'info'));
         }else return back()->with(notify()->flash(implode('and',$validator->errors()->all()),'error'));
      }else return back()->with(notify()->flash($validator->errors(),'danger'));
  }



    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $exist_user=User::where(['email'=>$user->getEmail()])->first();
        if($exist_user){
            Auth::login($exist_user);
            return redirect()->route('home');
        }else{
            return view('user/register')->with(['email'=>$user->getEmail(),'name'=>$user->getName()]);
        }

    }
    public function fredirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function fhandleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $exist_user=User::where(['email'=>$user->getEmail()])->first();
        if($exist_user){
            Auth::login($exist_user);
            return redirect()->route('home');
        }else{
            return view('user/register')->with(['email'=>$user->getEmail(),'name'=>$user->getName()]);
        }

    }

}
