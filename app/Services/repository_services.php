<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


function save_photo($image)
{
    $image_name = $image->getClientOriginalName();
    $image_hashed_name = hash('MD5', $image_name) . time() . "." . Str::afterLast($image_name, '.');
    $image->storeAs('images', $image_hashed_name, 'public');
    return $image_hashed_name;
}


function delete_photo($path)
{
    File::delete(public_path($path));
}