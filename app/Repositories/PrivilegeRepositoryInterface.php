<?php

namespace App\Repositories;


interface PrivilegeRepositoryInterface
{
    public function save($request, $admin_id);

    public function update($request, $admin_id);

    public function destroy($id);
}