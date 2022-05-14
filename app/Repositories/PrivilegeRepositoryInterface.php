<?php

namespace App\Repositories;


interface PrivilegeRepositoryInterface
{
    public function save($request, $admin);

    public function update($request, $admin);

    public function destroy($id);
}