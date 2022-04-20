<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // one to many relationship (inverse)
    public function user(){
        return $this->belongsTo('App\User');
    }


    // one to many relationship
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
