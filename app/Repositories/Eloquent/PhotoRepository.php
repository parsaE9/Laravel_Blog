<?php

namespace App\Repositories\Eloquent;


use App\Models\Photo;
use App\Repositories\PhotoRepositoryInterface;


class PhotoRepository implements PhotoRepositoryInterface
{
    public function save($request, $blog)
    {
        foreach ($request->file('images') as $image) {
            $image_name = $image->getClientOriginalName();
            $image_hashed_name = hash('MD5', $image_name) . time();
            $image->storeAs('images', $image_hashed_name, 'public');
            $photo = new Photo();
            $photo->path = '/storage/images/' . $image_hashed_name;
            $photo->blog()->associate($blog)->save();
        }
    }


    public function update($request, $blog)
    {
        if ($request->has('previous_images')) {
            foreach ($request->get('previous_images') as $image) {
                $photo = new Photo();
                $photo->path = str_replace("http://127.0.0.1:8000", "", $image);
                $photo->blog()->associate($blog)->save();
            }
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = $image->getClientOriginalName();
                $image_hashed_name = hash('MD5', $image_name) . time();
                $image->storeAs('images', $image_hashed_name, 'public');
                $photo = new Photo();
                $photo->path = '/storage/images/' . $image_hashed_name;
                $photo->blog()->associate($blog)->save();
            }
        }
    }


    public function destroy($id)
    {
        Photo::where('blog_id', $id)->delete();
    }
}