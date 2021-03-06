<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Trip;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon;

class TripController extends Controller
{
    public function match_or_create(Request $request)
    {


        $trips = Trip::all();


        $direction_points = $request['direction']['points'];
        $direction_begin = $request['direction']['location'];
        $direction_destination = $request['direction']['destination'];


        $av_trips = [];

        if ($request['DR'] == 'rider') {
            if ($trips) {

                foreach ($trips as $trip) {
                    // dd($trip->id);

                    $driver = Subscriber::where('trip_id', $trip->id)->where('status', 'master')->first();

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

                            }
                            if ($loction_state == true && $destination_state == true) {

                                $av_trips[] = [$trip->id];

                            }
                        }

                    }
                }
                if (count($av_trips) == 0) {
                    return response()->json(['value' => false, 'msg' => 'no available trips with your inputs']);
                }
                $trips_information = [];

                foreach ($av_trips as $trip_id) {
                    $target_trip = Trip::whereId($trip_id);
                    $target_trip_subscribers = Subscriber::all()->where('trip_id', $trip_id[0]);
                    $subscribers = [];
                    foreach ($target_trip_subscribers as $subscriber) {


                        $subscribers[] = ['id' => $subscriber->user_id, 'status' => $subscriber->status,'rating'=>$subscriber->user['id']];
                    }

                    $master = Subscriber::all()->where('trip_id', $trip->id)->where('status', 'master')->first();
                    $trips_information[] = [
                        'subscribers_id' => $subscribers,
                        'trip_id' => $trip_id[0],
                    ];


                }
                return response()->json(['value' => true, 'msg' => 'this is all available trips information ', 'data' => $trips_information]);
            } else return response()->json(['value' => false, 'msg' => 'no Trips yet']);
        }


        if ($request['DR'] == 'driver') {
            $t = new Trip();
            $s = new Subscriber();
            $t->time = $request['time'];
            $t->seats = $request['seats'];
            $t->save();
            $s->direction = $request['direction'];
            $s->filter = $request['filter'];
            $s->user_id = Auth::id();
            $s->status = 'master';
            $s->trip_id = $t->id;
            $s->save();
            return response()->json(['value' => true, 'msg' => ' trip created successfully wait for subscribers ']);
        }


    }

        public function trip_subscription(Request $request){
        $trip=Trip::wherId($request['trip_id']);
        $trip_driver=$trip->subscribers->wherStatus('master')->get();


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

    public function my_trips(){

        $subs=Subscriber::all()->where('user_id',Auth::id());
        $trips=[];
        foreach ($subs as $sub){
            $trips[]=$sub->trip;
        }
        $trips_arr=[];
        if ($trips) {
            foreach ($trips as $trip){
                $subscriberss=[];

                $subscribers=Subscriber::whereTrip_id($trip->id)->get();
                foreach ($subscribers as $subscriber)
                {
                    $subscriberss[] = ['id' => $subscriber->user_id, 'status' => $subscriber->status,'rating'=>$subscriber->user['rating'],'name'=>$subscriber->user['name']];

                }
                $trips_arr[]=[ 'subscribers_id'=>$subscriberss,'trip_id'=>$trip->id];



            }



            return response()->json(['value' => true, 'msg' => 'this is all of your trips', 'data' => $trips_arr]);
        }else return response()->json(['value'=>false,'msg'=>'no trips yet']);
    }


    public function get_trip($id){
        $target_subs=Subscriber::whereTrip_id($id)->get();
        $info=[];
        foreach ($target_subs as $sub){
            $info[]=['direction'=>$sub->direction];
            $info[]=['user_id'=>$sub->user_id];

        }
        return response()->json($info);



    }
    public function trip_checker(){



    }







}
