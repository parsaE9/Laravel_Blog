<?php

namespace App\Services;

use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\PhotoRepository;


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
        $this->photoRepository->update($request, $blog);
    }


    public function delete($id)
    {
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
    }

}