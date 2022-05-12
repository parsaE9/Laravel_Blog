<?php

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Models\Privilege;
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

        $user = new User();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->privilege = '2';
        $user->password = bcrypt($validated['password']);


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

        $user->save();
        $user->privileges()->save($privilege);
    }


    public function update($request, $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        if ($validated['password'] != $user->password) {
            $user->password = bcrypt($validated['password']);
        }


        if ($request['user_list'] == 'on') {
            $user->privileges->user_list = true;
        } else {
            $user->privileges->user_list = false;
        }
        if ($request['user_create'] == 'on') {
            $user->privileges->user_create = true;
        } else {
            $user->privileges->user_create = false;
        }
        if ($request['user_edit'] == 'on') {
            $user->privileges->user_edit = true;
        } else {
            $user->privileges->user_edit = false;
        }
        if ($request['user_delete'] == 'on') {
            $user->privileges->user_delete = true;
        } else {
            $user->privileges->user_delete = false;
        }


        if ($request['admin_list'] == 'on') {
            $user->privileges->admin_list = true;
        } else {
            $user->privileges->admin_list = false;
        }
        if ($request['admin_create'] == 'on') {
            $user->privileges->admin_create = true;
        } else {
            $user->privileges->admin_create = false;
        }
        if ($request['admin_edit'] == 'on') {
            $user->privileges->admin_edit = true;
        } else {
            $user->privileges->admin_edit = false;
        }
        if ($request['admin_delete'] == 'on') {
            $user->privileges->admin_delete = true;
        } else {
            $user->privileges->admin_delete = false;
        }


        if ($request['blog_list'] == 'on') {
            $user->privileges->blog_list = true;
        } else {
            $user->privileges->blog_list = false;
        }
        if ($request['blog_edit'] == 'on') {
            $user->privileges->blog_edit = true;
        } else {
            $user->privileges->blog_edit = false;
        }
        if ($request['blog_delete'] == 'on') {
            $user->privileges->blog_delete = true;
        } else {
            $user->privileges->blog_delete = false;
        }

        $user->save();
        $user->privileges->save();
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->username = $user->username . "_deleted_" . $user->id;
        $user->email = $user->email . "_deleted_" . $user->email;
        $user->privileges->deleted_at = date('Y-m-d H:i:s');
        $user->privileges->save();
        $user->save();
        $user->delete();
    }
}