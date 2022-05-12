<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    private $blogRepository;
    private $photoRepository;

    /**
     * Create a new controller instance.
     *
     * @param BlogRepositoryInterface $blogRepository
     * @param PhotoRepositoryInterface $photoRepository
     */
    public function __construct(BlogRepositoryInterface $blogRepository, PhotoRepositoryInterface $photoRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->photoRepository = $photoRepository;
    }


    public function index()
    {
        $this->authorize('admin-viewAll-blogs');
        $blogs = $this->blogRepository->all();
        return view('admin.blogs.index')->with('blogs', $blogs);
    }


    public function edit($id)
    {
        $this->authorize('admin-edit-blog');
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
        $this->authorize('admin-delete-blog');
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
        return redirect()->route('admin_blogs.index');
    }

}
