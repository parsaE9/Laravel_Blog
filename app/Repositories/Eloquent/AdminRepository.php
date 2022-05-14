<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class AdminRepository implements AdminRepositoryInterface
{

    public function all()
    {
        return User::where([
            ['id', '!=', Auth::user()->id],
            ['privilege', '2']
        ])->paginate(4);
    }


    public function find($id)
    {
        return User::findOrFail($id);
    }


    public function save($request)
    {
        $validated = $request->validated();

        $admin = new User();
        $admin->username = $validated['username'];
        $admin->email = $validated['email'];
        $admin->privilege = '2';
        $admin->password = bcrypt($validated['password']);
        $admin->save();

        return $admin;
    }


    public function update($request, $id)
    {
        $validated = $request->validated();

        $admin = User::findOrFail($id);
        $admin->username = $validated['username'];
        $admin->email = $validated['email'];

        if ($validated['password'] != $admin->password) {
            $admin->password = bcrypt($validated['password']);
        }

        $admin->save();

        return $admin;
    }


    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        $admin->username = $admin->username . "_deleted_" . $admin->id;
        $admin->email = $admin->email . "_deleted_" . $admin->id;
        $admin->save();
        $admin->delete();
    }
}