<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserValidation;
use App\Http\Requests\UpdateUserValidation;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserServices;


class UserController extends Controller
{

    private $userRepository;
    private $userServices;


    public function __construct(UserRepositoryInterface $userRepository, UserServices $userServices)
    {
        $this->userRepository = $userRepository;
        $this->userServices = $userServices;
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
        authorize_admin_or_user_edit('user_edit', $id);
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
        $this->userServices->delete($id);
        return redirect()->route('users.index');
    }
}
