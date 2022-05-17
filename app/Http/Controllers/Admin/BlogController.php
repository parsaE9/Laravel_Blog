<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;


class BlogController extends Controller
{

    private $blogRepository;
    private $photoRepository;


    public function __construct(BlogRepositoryInterface $blogRepository, PhotoRepositoryInterface $photoRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->photoRepository = $photoRepository;
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
        $blog = $this->blogRepository->update($request, $id);
        $this->photoRepository->update($request, $blog);
        return redirect()->route('admin_blogs.index');
    }


    public function destroy($id)
    {
        authorize_action('blog_delete', true);
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
        return redirect()->route('admin_blogs.index');
    }

}
