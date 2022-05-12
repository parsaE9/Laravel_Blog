<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminValidation;
use App\Http\Requests\UpdateAdminValidation;
use App\Repositories\AdminRepositoryInterface;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }


    public function index()
    {
        $this->authorize('admin-viewAll-admins');
        $admins = $this->adminRepository->all();
        return view('admin.admins.index')->with('admins', $admins);
    }


    public function create()
    {
        $this->authorize('admin-create-admin');
        return view('admin.admins.create');
    }


    public function store(CreateAdminValidation $request)
    {
        $this->adminRepository->save($request);
        return redirect()->route('admins.index');
    }


    public function edit($id)
    {
        $this->authorize('admin-edit-admin');
        $admin = $this->adminRepository->find($id);
        return view('admin.admins.edit')->with('admin', $admin);
    }


    public function update(UpdateAdminValidation $request, $id)
    {
        $this->adminRepository->update($request, $id);
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        $this->authorize('admin-delete-admin');
        $this->adminRepository->destroy($id);
        return redirect()->route('admins.index');
    }
}
