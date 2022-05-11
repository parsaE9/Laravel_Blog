<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $admins = $this->adminRepository->all();
        return view('admin.admins.index')->with('admins', $admins);
    }


    public function create()
    {
        return view('admin.admins.create');
    }


    public function store(Request $request)
    {
        $this->adminRepository->save($request);
        return redirect()->route('admins.index');
    }


    public function edit($id)
    {
        $admin = $this->adminRepository->find($id);
        return view('admin.admins.edit')->with('admin', $admin);
    }


    public function update(Request $request, $id)
    {
        $this->adminRepository->update($request, $id);
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        $this->adminRepository->destroy($id);
        return redirect()->route('admins.index');
    }
}
