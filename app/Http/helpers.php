<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;


function authorize_action($action, $throw_error = false)
{
    $privileges = Auth::user()->privileges;
    foreach ($privileges as $privilege) {
        if ($privilege->name == $action) {
            return true;
        }
    }
    return $throw_error ? abort('403') : false;
}


function edit_admin($action, $id)
{
    $privileges = User::find($id)->privileges;
    foreach ($privileges as $privilege) {
        if ($privilege->name == $action) {
            return true;
        }
    }
    return false;
}