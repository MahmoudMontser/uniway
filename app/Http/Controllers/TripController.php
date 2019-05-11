<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function match_or_create(Request $request)
    {

        $trips = Trip::all()->get();
        $direction_points=$request['direction']->points;
        $direction_begin=$request['direction']->location;
        $direction_destination=$request['direction']->destination;


        $av_trips=[];

            if ($request['DR'] == 'rider') {

                foreach ($trips as $trip) {

                    $driver=$trip->subscribers->where($trip->subscribers->status=='master');
                    $driver_direction_begin=$driver->direction['location'];
                    $driver_direction_destination=$driver->direction['destination'];
                    $driver_direction_points=$driver->direction['points'];

                    $loction_state=false;
                    $destination_state=false;
                    if ($trip->time==$request['time']){
                        if ($trip->seats<$request['seats']){
                    foreach ($driver_direction_points as $point){


                        if ($direction_begin==$point){
                            $loction_state=true;
                        }

                        foreach ($driver_direction_points as $point){
                            if ($direction_destination==$point){
                                $destination_state=true;
                            }
                        }
                        if ($loction_state==true&&$destination_state==true){
                            $av_trips[]=[$trip->id];
                        }
                    }
                        }

                }
                }
                if ($av_trips=[]){
                    return response()->json(['value'=>false,'msg'=>'no available trips with your inputs']);
                }
                $trips_information=[];
                foreach ($av_trips as $trip_id){
                    $target_trip=Trip::whereId($trip_id);
                    $target_trip_subscribers[]=$target_trip->subscribers()->all()->get();
                    $trips_information[]=['master_begin_point'=>$target_trip->subscribers()->direction['location']->where($target_trip->subscribers()->status=='master'),
                        'master_destination_point'=>$target_trip->subscribers()->direction['destination']->where($target_trip->subscribers()->status=='master'),
                        'trip_time'=>$target_trip->time,
                        'subscribers_id'=>$target_trip_subscribers,
                    ];



                }
                return response()->json(['value'=>true,'msg'=>'this is all available trips information ','data'=>$trips_information]);

            }






        if ($request['DR'] == 'driver') {
            $t=new Trip();
            $t->time=$request['time'];
            $t->seats=$request['seats'];
            $t->subscribers()->direction=$request['direction'];
            $t->subscribers()->filter=$request['filter'];
            $t->subscribers()->user_id=Auth::id();
            $t->subscribers()->status='master';
            $t->save();
            return response()->json(['value'=>true,'msg'=>' trip created successfully wait for subscribers ']);
        }





    }

    public function trip_subscription(Request $request){
        $trip=Trip::wherId($request['trip_id']);
        $trip_driver=$trip->subscribers->wherStatus('master')->get();
        if ($trip_driver->filter['online_only']==false){

            if($trip_driver->filter['rating']<=Auth::rating()&&$trip_driver->filter['seats']<=$request['seats']){
                $s=new Subscriber();
                $s->seats=$request['seats'];
                $s->direction=$request['direction'];
                $s->trip_id=$trip->id;
                $s->user_id=Auth::id();
                $s->save();
                return response()->json(['value'=>true,'msg'=>' subscription done successfully ']);

            }else return response()->json(['value'=>false,'msg'=>'You do not fit the conditions of the car owner' ]);


        }
        if ($trip_driver->filter['online_only']==false){


            
        }


    }







}
