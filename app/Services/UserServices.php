<?php

namespace App\Services;


use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\PhotoRepository;
use App\Repositories\Eloquent\UserRepository;

class UserServices
{

    private $userRepository;
    private $blogRepository;
    private $photoRepository;


    public function __construct(UserRepository $userRepository, BlogRepository $blogRepository, PhotoRepository $photoRepository)
    {

        $this->userRepository = $userRepository;
        $this->blogRepository = $blogRepository;
        $this->photoRepository = $photoRepository;
    }


    public function delete($id)
    {
        $user_blogs_IDs = $this->userRepository->destroy($id);
        foreach ($user_blogs_IDs as $user_blog_ID) {
            $this->photoRepository->destroy($user_blog_ID);
            $this->blogRepository->destroy($user_blog_ID);
        }
    }
}