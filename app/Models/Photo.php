<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;


    // one to many relationship (inverse)
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }
}
