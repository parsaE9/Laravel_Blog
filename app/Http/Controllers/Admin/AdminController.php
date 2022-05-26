<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminValidation;
use App\Http\Requests\UpdateAdminValidation;
use App\Repositories\AdminRepositoryInterface;
use App\Repositories\PrivilegeRepositoryInterface;
use App\Services\AdminServices;


class AdminController extends Controller
{

    private $adminRepository;
    private $privilegeRepository;
    private $adminServices;

    public function __construct(AdminRepositoryInterface $adminRepository, PrivilegeRepositoryInterface $privilegeRepository, AdminServices $adminServices)
    {
        $this->adminRepository = $adminRepository;
        $this->privilegeRepository = $privilegeRepository;
        $this->adminServices = $adminServices;
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
        $this->adminServices->create($request);
        return redirect()->route('admins.index');
    }


    public function edit($id)
    {
        authorize_admin_or_user_edit('admin_edit', $id);
        $data = $this->adminServices->edit($id);
        return view('admin.admins.edit')->with('admin', $data['admin'])->with('privileges', $data['privileges']);
    }


    public function update(UpdateAdminValidation $request, $id)
    {
        $this->adminServices->update($request, $id);
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        authorize_action('admin_delete', true);
        $this->adminServices->delete($id);
        return redirect()->route('admins.index');
    }
}
