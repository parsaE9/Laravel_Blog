<?php

namespace App\Repositories\Eloquent;

use App\Models\Privilege;
use App\Repositories\PrivilegeRepositoryInterface;


class PrivilegeRepository implements PrivilegeRepositoryInterface
{

    public function save($request, $admin)
    {
        $privilege = new Privilege();

        if ($request['user_list'] == 'on') {
            $privilege->user_list = true;
        }
        if ($request['user_create'] == 'on') {
            $privilege->user_create = true;
        }
        if ($request['user_edit'] == 'on') {
            $privilege->user_edit = true;
        }
        if ($request['user_delete'] == 'on') {
            $privilege->user_delete = true;
        }


        if ($request['admin_list'] == 'on') {
            $privilege->admin_list = true;
        }
        if ($request['admin_create'] == 'on') {
            $privilege->admin_create = true;
        }
        if ($request['admin_edit'] == 'on') {
            $privilege->admin_edit = true;
        }
        if ($request['admin_delete'] == 'on') {
            $privilege->admin_delete = true;
        }


        if ($request['blog_list'] == 'on') {
            $privilege->blog_list = true;
        }
        if ($request['blog_edit'] == 'on') {
            $privilege->blog_edit = true;
        }
        if ($request['blog_delete'] == 'on') {
            $privilege->blog_delete = true;
        }

        $privilege->user()->associate($admin)->save();
    }


    public function update($request, $admin)
    {
        $privilege = Privilege::where('user_id', $admin->id)->first();

        if ($request['user_list'] == 'on') {
            $privilege->user_list = true;
        } else {
            $privilege->user_list = false;
        }
        if ($request['user_create'] == 'on') {
            $privilege->user_create = true;
        } else {
            $privilege->user_create = false;
        }
        if ($request['user_edit'] == 'on') {
            $privilege->user_edit = true;
        } else {
            $privilege->user_edit = false;
        }
        if ($request['user_delete'] == 'on') {
            $privilege->user_delete = true;
        } else {
            $privilege->user_delete = false;
        }


        if ($request['admin_list'] == 'on') {
            $privilege->admin_list = true;
        } else {
            $privilege->admin_list = false;
        }
        if ($request['admin_create'] == 'on') {
            $privilege->admin_create = true;
        } else {
            $privilege->admin_create = false;
        }
        if ($request['admin_edit'] == 'on') {
            $privilege->admin_edit = true;
        } else {
            $privilege->admin_edit = false;
        }
        if ($request['admin_delete'] == 'on') {
            $privilege->admin_delete = true;
        } else {
            $privilege->admin_delete = false;
        }


        if ($request['blog_list'] == 'on') {
            $privilege->blog_list = true;
        } else {
            $privilege->blog_list = false;
        }
        if ($request['blog_edit'] == 'on') {
            $privilege->blog_edit = true;
        } else {
            $privilege->blog_edit = false;
        }
        if ($request['blog_delete'] == 'on') {
            $privilege->blog_delete = true;
        } else {
            $privilege->blog_delete = false;
        }

        $privilege->save();
    }


    public function destroy($id)
    {
        Privilege::where('user_id', $id)->delete();
    }
}