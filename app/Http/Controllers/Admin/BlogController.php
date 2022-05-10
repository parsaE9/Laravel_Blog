<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;
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
        $blogs = $this->blogRepository->all();
        return view('admin.index')->with('blogs', $blogs);
    }


    public function show($id)
    {
        $blog = $this->blogRepository->find($id);
        return view('admin.show')->with('blog', $blog);
    }


    public function edit($id){
        $blog = $this->blogRepository->find($id);
        return view('admin.edit')->with('blog', $blog);
    }


    public function update(UpdateBlogValidation $request, $id){
        $blog = $this->blogRepository->update($request, $id);
        $this->photoRepository->update($request, $blog);
        return redirect()->route('admin_blogs.index');
    }


    public function destroy($id){
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
        return redirect()->route('admin_blogs.index');
    }

}
