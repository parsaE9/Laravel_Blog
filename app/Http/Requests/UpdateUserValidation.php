<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserValidation extends FormRequest
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
        $id = $this->route('user');
        return [
            'username' => 'required|unique:users,username, ' . $id,
            'email' => 'required|unique:users,email, ' . $id,
            'password' => 'required',
        ];
    }
}
