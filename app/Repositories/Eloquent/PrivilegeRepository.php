<?php

namespace App\Repositories\Eloquent;

use App\Models\Privilege;
use App\Repositories\PrivilegeRepositoryInterface;


class PrivilegeRepository implements PrivilegeRepositoryInterface
{

    public function create($request, $admin_id)
    {
        if ($request['user_list'] == 'on') {
            Privilege::find(1)->users()->attach($admin_id);
        }
        if ($request['user_create'] == 'on') {
            Privilege::find(2)->users()->attach($admin_id);
        }
        if ($request['user_edit'] == 'on') {
            Privilege::find(3)->users()->attach($admin_id);
        }
        if ($request['user_delete'] == 'on') {
            Privilege::find(4)->users()->attach($admin_id);
        }


        if ($request['admin_list'] == 'on') {
            Privilege::find(5)->users()->attach($admin_id);
        }
        if ($request['admin_create'] == 'on') {
            Privilege::find(6)->users()->attach($admin_id);
        }
        if ($request['admin_edit'] == 'on') {
            Privilege::find(7)->users()->attach($admin_id);
        }
        if ($request['admin_delete'] == 'on') {
            Privilege::find(8)->users()->attach($admin_id);
        }


        if ($request['blog_list'] == 'on') {
            Privilege::find(9)->users()->attach($admin_id);
        }
        if ($request['blog_edit'] == 'on') {
            Privilege::find(10)->users()->attach($admin_id);
        }
        if ($request['blog_delete'] == 'on') {
            Privilege::find(11)->users()->attach($admin_id);
        }

    }


    public function update($request, $admin_id)
    {
        $this->destroy($admin_id);
        $this->save($request, $admin_id);
    }


    public function destroy($id)
    {
        $privileges = Privilege::all();
        foreach ($privileges as $privilege) {
            foreach ($privilege->users as $user) {
                if ($user->pivot->user_id == $id){
                    $user->pivot->delete();
                }
            }
        }
    }
}