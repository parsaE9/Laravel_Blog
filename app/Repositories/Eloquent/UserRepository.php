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

    public function create($request)
    {
        $validated = $request->validated();

        $user = $this->model->newInstance();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->privilege = '1';
        $user->password = bcrypt($validated['password']);
        $user->save();
    }


    public function update($request, $id)
    {
        $validated = $request->validated();

        $user = $this->model->findOrFail($id);
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        if ($validated['password'] != $user->password) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();
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