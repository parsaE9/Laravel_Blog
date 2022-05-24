<?php

namespace App\Repositories\Eloquent;

use App\Models\Photo;
use App\Repositories\PhotoRepositoryInterface;


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
            $image_hashed_name = save_photo($image);
            $photo = $this->model->newInstance();
            $photo->path = '/storage/images/' . $image_hashed_name;
            $photo->blog()->associate($blog)->save();
        }
    }


    public function update($request, $blog)
    {
        if ($request->has('previous_images')) {
            foreach ($blog->photos as $key => $value) {
                if (!in_array($value->path, $request->get('previous_images'))) {
                    delete_photo($value->path);
                    $this->model->where('path', $value->path)->delete();
                }
            }
        } else {
            foreach ($blog->photos as $key => $value) {
                delete_photo($value->path);
                $this->model->where('path', $value->path)->delete();
            }
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $image_hashed_name = save_photo($image);
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
            delete_photo($photo->path);
            $photo->delete();
        }
    }

}