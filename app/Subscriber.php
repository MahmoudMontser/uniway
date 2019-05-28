<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable=['user_id','status','seats'];
    protected $casts=['direction'=>'json','filter'=>'json',];
    public function trip(){
        return $this->belongsTo(Trip::class,'trip_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}


