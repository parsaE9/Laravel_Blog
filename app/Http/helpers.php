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


function authorize_admin_or_user_edit($action, $id)
{
    authorize_action($action, true);

    if (Auth::user()->id == $id){
        return abort('403');
    }

    $privilege = User::find($id)->privilege;
    if (($privilege == '1' and $action == 'admin_edit') or ($privilege == '2' and $action == 'user_edit')) {
        return abort('403');
    }

    return true;
}


function admin_has_access($action, $id)
{
    $privileges = User::find($id)->privileges;
    foreach ($privileges as $privilege) {
        if ($privilege->name == $action) {
            return true;
        }
    }
    return false;
}