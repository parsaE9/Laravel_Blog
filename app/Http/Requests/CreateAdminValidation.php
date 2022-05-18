<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'privilege' => 'required',
            'password' => 'required',
            'user_list' => 'required_with:user_create|required_with:user_edit|required_with:user_delete',
            'admin_list' => 'required_with:admin_create|required_with:admin_edit|required_with:admin_delete',
            'blog_list' => 'required_with:blog_edit|required_with:blog_delete',
        ];
    }
}
