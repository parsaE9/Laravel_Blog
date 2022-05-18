<?php

namespace App\Repositories;


interface PrivilegeRepositoryInterface
{
    public function create($request, $admin_id);
}