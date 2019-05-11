<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable=['user_id','status','seats'];
    protected $casts=['direction','filter',];
}
