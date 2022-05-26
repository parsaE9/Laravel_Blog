<?php

namespace App\Services;

use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Eloquent\PrivilegeRepository;


class AdminServices
{

    private $adminRepository;
    private $privilegeRepository;


    public function __construct(AdminRepository $adminRepository, PrivilegeRepository $privilegeRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->privilegeRepository = $privilegeRepository;
    }


    public function create($request)
    {
        $admin = $this->adminRepository->create($request);
        $data = ['request' => $request, 'admin' => $admin];
        $this->privilegeRepository->create($data);
    }


    public function edit($id)
    {
        $admin = $this->adminRepository->find($id);
        $privileges = $this->privilegeRepository->all();
        $data = ['admin' => $admin, 'privileges' => $privileges];
        return $data;
    }


    public function update($request, $id)
    {
        $admin = $this->adminRepository->update($request, $id);
        $this->privilegeRepository->update($request, $admin);
    }


    public function delete($id)
    {
        $this->privilegeRepository->destroy($id);
        $this->adminRepository->destroy($id);
    }

}