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
        $privileges = $this->privilegeRepository->all();
        return view('admin.admins.create')->with('privileges', $privileges);
    }


    public function store(CreateAdminValidation $request)
    {
        store_admin($request, $this->adminRepository, $this->privilegeRepository);
        return redirect()->route('admins.index');
    }


    public function edit($id)
    {
        authorize_action('admin_edit', true);
        $admin = $this->adminRepository->find($id);
        $privileges = $this->privilegeRepository->all();
        return view('admin.admins.edit')->with('admin', $admin)->with('privileges', $privileges);
    }


    public function update(UpdateAdminValidation $request, $id)
    {
        update_admin($request, $id, $this->adminRepository, $this->privilegeRepository);
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        authorize_action('admin_delete', true);
        destroy_admin($id, $this->adminRepository, $this->privilegeRepository);
        return redirect()->route('admins.index');
    }
}
