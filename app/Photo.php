<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'image'
    ];

    // one to many relationship (inverse)
    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
