<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserValidation;
use App\Http\Requests\UpdateUserValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;
use App\Repositories\UserRepositoryInterface;


class UserController extends Controller
{

    private $userRepository;
    private $blogRepository;
    private $photoRepository;


    public function __construct(UserRepositoryInterface $userRepository, BlogRepositoryInterface $blogRepository, PhotoRepositoryInterface $photoRepository)
    {
        $this->userRepository = $userRepository;
        $this->blogRepository = $blogRepository;
        $this->photoRepository = $photoRepository;
    }

    public function index()
    {
        authorize_action('user_list', true);
        $users = $this->userRepository->all();
        return view('admin.users.index')->with('users', $users);
    }


    public function create()
    {
        authorize_action('user_create', true);
        return view('admin.users.create');
    }


    public function store(CreateUserValidation $request)
    {
        $this->userRepository->create($request);
        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        authorize_action('user_edit', true);
        $user = $this->userRepository->find($id);
        return view('admin.users.edit')->with('user', $user);
    }


    public function update(UpdateUserValidation $request, $id)
    {
        $this->userRepository->update($request, $id);
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        authorize_action('user_delete', true);

        $user_blogs_IDs = $this->userRepository->destroy($id);
        foreach ($user_blogs_IDs as $user_blog_ID){
            $this->photoRepository->destroy($user_blog_ID);
            $this->blogRepository->destroy($user_blog_ID);
        }

        return redirect()->route('users.index');
    }
}
