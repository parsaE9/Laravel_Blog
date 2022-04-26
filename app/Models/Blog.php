<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    // one to many relationship (inverse)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    // one to many relationship
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
