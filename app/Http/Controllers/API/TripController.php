<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
use App\Trip;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function match_or_create(Request $request)
    {

        $trips = Trip::all();


        $direction_points=$request['direction']['points'];
        $direction_begin=$request['direction']['location'];
        $direction_destination=$request['direction']['destination'];


        $av_trips=[];

        if ($request['DR'] == 'rider') {
            if($trips) {

                foreach ($trips as $trip) {
                   // dd($trip->id);

                    $driver = Subscriber::where('trip_id',$trip->id)->where('status','master')->first();

                    $driver_direction_begin = $driver->direction['location'];

                    $driver_direction_destination = $driver->direction['destination'];
                    $driver_direction_points = $driver->direction['points'];

                    $loction_state = false;
                    $destination_state = false;
                    if ($trip->time == $request['time']) {
                        if ($trip->seats >= $request['seats']) {

                            foreach ($driver_direction_points as $point) {


                                if ($direction_begin == $point) {
                                    $loction_state = true;

                                }

                                foreach ($driver_direction_points as $point) {

                                    if ($direction_destination == $point) {
                                        $destination_state = true;

                                    }
                                }
                                if ($loction_state == true && $destination_state == true) {

                                    $av_trips = [$trip->id];

                                }
                            }
                        }

                    }
                }
                if (count($av_trips)==0 ) {
                    return response()->json(['value' => false, 'msg' => 'no available trips with your inputs']);
                }
                $trips_information = [];
                foreach ($av_trips as $trip_id) {
                    $target_trip = Trip::whereId($trip_id);
                    $target_trip_subscribers = Subscriber::all()->where('trip_id',$trip->id);
                    $subscribers=[];
                    foreach ($target_trip_subscribers as $subscriber){

                        $subscribers[]=['id'=>$subscriber->user_id,'status'=>$subscriber->status];
                    }

                    $master=Subscriber::all()->where('trip_id',$trip->id)->where('status','master')->first();
                    $trips_information[] = ['master_begin_point' => $master['direction']['location'],
                        'master_destination_point' =>$master['direction']['destination'] ,
                        'trip_time' => $trip->time,
                        'subscribers_id' => $subscribers,
                        'trip_id'=>$trip->id,
                    ];


                }
                return response()->json(['value' => true, 'msg' => 'this is all available trips information ', 'data' => $trips_information]);
            }else return response()->json(['value' => false, 'msg' => 'no Trips yet']);
        }






        if ($request['DR'] == 'driver') {
            $t=new Trip();
            $s=new Subscriber();
            $t->time=$request['time'];
            $t->seats=$request['seats'];
            $t->save();
            $s->direction=$request['direction'];
            $s->filter=$request['filter'];
            $s->user_id=Auth::id();
            $s->status='master';
            $s->trip_id=$t->id;
            $s->save();
            return response()->json(['value'=>true,'msg'=>' trip created successfully wait for subscribers ']);
        }





    }
}