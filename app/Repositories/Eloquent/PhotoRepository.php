<?php

namespace App\Repositories\Eloquent;


use App\Models\Photo;
use App\Repositories\PhotoRepositoryInterface;
use Illuminate\Support\Facades\File;


class PhotoRepository implements PhotoRepositoryInterface
{
    public function create($request, $blog)
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
            foreach ($blog->photos as $key => $value) {
                if (!in_array($value->path, $request->get('previous_images'))) {
                    File::delete(public_path($value->path));
                    Photo::where('path', $value->path)->delete();
                }
            }
        } else {
            foreach ($blog->photos as $key => $value) {
                File::delete(public_path($value->path));
                Photo::where('path', $value->path)->delete();
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
        $photos = Photo::where('blog_id', $id)->get();
        foreach ($photos as $photo) {
            File::delete(public_path($photo->path));
            $photo->delete();
        }
    }

}