<?php

namespace App\Repositories\Eloquent;

use App\Models\Privilege;
use App\Repositories\PrivilegeRepositoryInterface;


class PrivilegeRepository extends BaseRepository implements PrivilegeRepositoryInterface
{

    public function __construct(Privilege $model)
    {
        parent::__construct($model);
    }


    public function create($request, $admin_id)
    {
        if ($request['user_list'] == 'on') {
            $this->model->find(1)->users()->attach($admin_id);
        }
        if ($request['user_create'] == 'on') {
            $this->model->find(2)->users()->attach($admin_id);
        }
        if ($request['user_edit'] == 'on') {
            $this->model->find(3)->users()->attach($admin_id);
        }
        if ($request['user_delete'] == 'on') {
            $this->model->find(4)->users()->attach($admin_id);
        }


        if ($request['admin_list'] == 'on') {
            $this->model->find(5)->users()->attach($admin_id);
        }
        if ($request['admin_create'] == 'on') {
            $this->model->find(6)->users()->attach($admin_id);
        }
        if ($request['admin_edit'] == 'on') {
            $this->model->find(7)->users()->attach($admin_id);
        }
        if ($request['admin_delete'] == 'on') {
            $this->model->find(8)->users()->attach($admin_id);
        }


        if ($request['blog_list'] == 'on') {
            $this->model->find(9)->users()->attach($admin_id);
        }
        if ($request['blog_edit'] == 'on') {
            $this->model->find(10)->users()->attach($admin_id);
        }
        if ($request['blog_delete'] == 'on') {
            $this->model->find(11)->users()->attach($admin_id);
        }
    }


    public function update($request, $admin_id)
    {
        $this->destroy($admin_id);
        $this->create($request, $admin_id);
    }


    public function destroy($id)
    {
        $privileges = $this->model->all();
        foreach ($privileges as $privilege) {
            foreach ($privilege->users as $user) {
                if ($user->pivot->user_id == $id){
                    $user->pivot->delete();
                }
            }
        }
    }
}