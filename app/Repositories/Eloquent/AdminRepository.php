<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function all()
    {
        return $this->model->where([
            ['id', '!=', Auth::user()->id],
            ['privilege', '2']
        ])->paginate(4);
    }


    public function find($id)
    {
        return $this->model->findOrFail($id);
    }


    public function destroy($id)
    {
        $admin = $this->model->findOrFail($id);
        $admin->username = $admin->username . "_deleted_" . $admin->id;
        $admin->email = $admin->email . "_deleted_" . $admin->id;
        $admin->save();
        $admin->delete();
    }
}