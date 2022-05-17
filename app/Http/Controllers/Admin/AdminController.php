<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminValidation;
use App\Http\Requests\UpdateAdminValidation;
use App\Repositories\AdminRepositoryInterface;
use App\Repositories\PrivilegeRepositoryInterface;


class AdminController extends Controller
{

    private $adminRepository;
    private $privilegeRepository;

    public function __construct(AdminRepositoryInterface $adminRepository, PrivilegeRepositoryInterface $privilegeRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->privilegeRepository = $privilegeRepository;
    }


    public function index()
    {
        authorize_action('admin_list', true);
        $admins = $this->adminRepository->all();
        return view('admin.admins.index')->with('admins', $admins);
    }


    public function create()
    {
        authorize_action('admin_create', true);
        return view('admin.admins.create');
    }


    public function store(CreateAdminValidation $request)
    {
        $admin_id = $this->adminRepository->save($request);
        $this->privilegeRepository->save($request, $admin_id);
        return redirect()->route('admins.index');
    }


    public function edit($id)
    {
        authorize_action('admin_edit', true);
        $admin = $this->adminRepository->find($id);
        return view('admin.admins.edit')->with('admin', $admin);
    }


    public function update(UpdateAdminValidation $request, $id)
    {
        $admin_id = $this->adminRepository->update($request, $id);
        $this->privilegeRepository->update($request, $admin_id);
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        authorize_action('admin_delete', true);
        $this->privilegeRepository->destroy($id);
        $this->adminRepository->destroy($id);
        return redirect()->route('admins.index');
    }
}
