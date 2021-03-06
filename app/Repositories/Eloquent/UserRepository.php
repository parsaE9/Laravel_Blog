<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function all()
    {
        return $this->model->where('privilege', '1')->paginate(4);
    }


    public function find($id)
    {
        return $this->model->findOrFail($id);
    }


    public function destroy($id)
    {
        $user = $this->model->findOrFail($id);
        $user_blogs_IDs = $user->blogs()->pluck('id')->all();

        $user->username = $user->username . "_deleted_" . $user->id;
        $user->email = $user->email . "_deleted_" . $user->email;
        $user->save();
        $user->delete();

        return $user_blogs_IDs;
    }
}