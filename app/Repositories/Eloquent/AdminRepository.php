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
    }

    public function update($request, $id)
    {
    }

    public function destroy($id)
    {
    }
}