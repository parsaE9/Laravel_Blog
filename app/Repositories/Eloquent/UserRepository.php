<?php

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        return User::paginate(4);
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function save($request)
    {
        $validated = $request->validated();

        $user = new User();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->privilege = '1';
        $user->password = bcrypt($validated['password']);
        $user->save();
    }


    public function update($request, $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        if ($validated['password'] != $user->password){
            $user->password = bcrypt($validated['password']);
        }
        $user->save();
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user_blogs_IDs = $user->blogs()->pluck('id')->all();

        $user->username = $user->username . "_deleted_" . $user->id;
        $user->email = $user->email . "_deleted_" . $user->email;
        $user->save();
        $user->delete();

        return $user_blogs_IDs;
    }
}