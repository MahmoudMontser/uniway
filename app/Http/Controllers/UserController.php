<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function update_page(){
        $user=User::whereId(Auth::id())->first();
        return view('user.edit_profile',['user'=>$user]);

    }
    public function update(Request $request){
        $user=User::whereId(Auth::id())->first();
        $validator=Validator::make($request->all(),[

            'email'=>'required|email',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'name'=>'required',
        ]);
        if ($validator->passes()){

            $user->name=$request['name'];
            $user->email=$request['email'];
            if ($request->hasFile('pic')){
                $pic = md5($request['pic']->getClientOriginalName()).'.'.$request['pic']->getClientOriginalExtension();
                $request['pic']->move(public_path('images/user_profile'),$pic);}

            $user->pic= $pic;
            $user->phone=$request['phone'];
            $user->password=bcrypt($request['password']);
            $user->update();
            return redirect()->route('profile')->with(notify()->flash('Updated Successfully','success'));
    }return redirect()->back()->with(notify()->flash(implode('and',$validator->errors()->all()),'error'));

}

}
