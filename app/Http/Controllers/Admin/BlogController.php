<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Services\BlogServices;


class BlogController extends Controller
{

    private $blogRepository;
    private $blogServices;


    public function __construct(BlogRepositoryInterface $blogRepository, BlogServices $blogServices)
    {
        $this->blogRepository = $blogRepository;
        $this->blogServices = $blogServices;
    }


    public function index()
    {
        authorize_action('blog_list', true);
        $blogs = $this->blogRepository->all();
        return view('admin.blogs.index')->with('blogs', $blogs);
    }


    public function edit($id)
    {
        authorize_action('blog_edit', true);
        $blog = $this->blogRepository->find($id);
        return view('admin.blogs.edit')->with('blog', $blog);
    }


    public function update(UpdateBlogValidation $request, $id)
    {
        $this->blogServices->update($request, $id);
        return redirect()->route('admin_blogs.index');
    }


    public function destroy($id)
    {
        authorize_action('blog_delete', true);
        $this->blogServices->delete($id);
        return redirect()->route('admin_blogs.index');
    }

}
