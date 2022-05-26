<?php

namespace App\Services;

use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\PhotoRepository;
use Illuminate\Support\Facades\File;


class BlogServices
{

    private $blogRepository;
    private $photoRepository;


    public function __construct(BlogRepository $blogRepository, PhotoRepository $photoRepository)
    {

        $this->blogRepository = $blogRepository;
        $this->photoRepository = $photoRepository;
    }


    public function create($request)
    {
        $blog = $this->blogRepository->create($request);
        $data = ['request' => $request, 'blog' => $blog];
        $this->photoRepository->create($data);
    }


    public function update($request, $id)
    {
        $blog = $this->blogRepository->update($request, $id);
        $deleted_images = $this->find_deleted_images($request, $blog);
        $data = ['blog' => $blog, 'deleted_images' => $deleted_images];
        $this->photoRepository->update($request, $data);
    }


    public function delete($id)
    {
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
    }


    private function find_deleted_images($request, $blog)
    {
        $deleted_images = [];

        if ($request->has('previous_images')) {
            foreach ($blog->photos as $key => $value) {
                if (!in_array($value->path, $request->get('previous_images'))) {
                    File::delete(public_path($value->path));
                    $deleted_images[] = $value->path;
                }
            }
        } else {
            foreach ($blog->photos as $key => $value) {
                File::delete(public_path($value->path));
                $deleted_images[] = $value->path;
            }
        }

        return $deleted_images;
    }
}