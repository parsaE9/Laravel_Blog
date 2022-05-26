<?php

namespace App\Repositories\Eloquent;

use App\Models\Photo;
use App\Repositories\PhotoRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PhotoRepository extends BaseRepository implements PhotoRepositoryInterface
{

    public function __construct(Photo $model)
    {
        parent::__construct($model);
    }


    public function create($data)
    {
        $request = $data['request'];
        $blog = $data['blog'];

        foreach ($request->file('images') as $image) {
            $image_name = $image->getClientOriginalName();
            $image_hashed_name = hash('MD5', $image_name) . time() . "." . Str::afterLast($image_name, '.');
            $image->storeAs('images', $image_hashed_name, 'public');
            $photo = $this->model->newInstance();
            $photo->path = '/storage/images/' . $image_hashed_name;
            $photo->blog()->associate($blog)->save();
        }
    }


    public function update($request, $data)
    {
        $blog = $data['blog'];
        $deleted_images = $data['deleted_images'];

        foreach ($deleted_images as $deleted_image_path) {
            $this->model->where('path', $deleted_image_path)->delete();
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = $image->getClientOriginalName();
                $image_hashed_name = hash('MD5', $image_name) . time() . "." . Str::afterLast($image_name, '.');
                $image->storeAs('images', $image_hashed_name, 'public');
                $photo = $this->model->newInstance();
                $photo->path = '/storage/images/' . $image_hashed_name;
                $photo->blog()->associate($blog)->save();
            }
        }
    }


    public function destroy($id)
    {
        $photos = $this->model->where('blog_id', $id)->get();
        foreach ($photos as $photo) {
            File::delete(public_path($photo->path));
            $photo->delete();
        }
    }

}