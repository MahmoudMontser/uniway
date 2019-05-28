<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable=['place_id','rate'];

    public function Place(){

        return $this->belongsTo(Place::class);

    }

    public function User(){

        return $this->belongsTo(User::class);
    }
    public function trip(){

        return $this->belongsTo(Trip::class);
    }
}
