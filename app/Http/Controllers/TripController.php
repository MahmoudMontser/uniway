<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function match(Request $request){

        $trips=Trip::all()->get();

        if($request['DR']=='rider')
        {

        }

        if ($request['DR']=='driver')
        {


        }
    }
}
