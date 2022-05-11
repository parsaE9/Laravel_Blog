<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateBlogValidation extends FormRequest
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
        if ($this->route('admin_blog') == null){
            $id = $this->route('user_blog');
        }else{
            $id = $this->route('admin_blog');
        }

        return [
            'title' => 'required|unique:blogs,title, ' . $id,
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
            'images' => 'required_without:previous_images',
        ];
    }
}
