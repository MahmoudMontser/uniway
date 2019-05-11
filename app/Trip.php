<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable=['subscriber_id'];
    protected $casts=['time'=>'json',

    ];


    public function subscribers(){

       return $this->hasMany(Subscriber::class,'subscribers_id','id');
    }
}
