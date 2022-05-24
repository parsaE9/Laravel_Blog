<?php

namespace App\Repositories\Eloquent;

use App\Models\Privilege;
use App\Repositories\PrivilegeRepositoryInterface;
use Carbon\Carbon;


class PrivilegeRepository extends BaseRepository implements PrivilegeRepositoryInterface
{

    public function __construct(Privilege $model)
    {
        parent::__construct($model);
    }


    public function all()
    {
        return $this->model->all();
    }


    public function create($data)
    {
        $request = $data['request'];
        $admin = $data['admin'];
        $admin->privileges()->attach($request['access']);
    }


    public function update($request, $admin)
    {
        $admin->privileges()->sync($request['access']);
    }


    public function destroy($id)
    {
        $privileges = $this->model->all();
        foreach ($privileges as $privilege) {
            foreach ($privilege->users as $user) {
                if ($user->pivot->user_id == $id){
                    $user->pivot->deleted_at = Carbon::now();
                    $user->pivot->save();
                }
            }
        }
    }
}