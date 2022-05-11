<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogValidation;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\PhotoRepositoryInterface;
use Illuminate\Support\Facades\Gate;

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
        $blogs = $this->blogRepository->user_blogs();
        return view('user.index')->with('blogs', $blogs);
    }


    public function create()
    {
        return view('user.create');
    }


    public function store(StoreBlogValidation $request)
    {
        $blog = $this->blogRepository->save($request);
        $this->photoRepository->save($request, $blog);
        return redirect()->route('user_blogs.index');
    }


    public function show($id)
    {
        $blog = $this->blogRepository->find($id);
        Gate::authorize('view-update-blog', $blog);
        return view('user.show')->with('blog', $blog);
    }


    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);
        Gate::authorize('view-update-blog', $blog);
        return view('user.edit')->with('blog', $blog);
    }


    public function update(UpdateBlogValidation $request, $id)
    {
        $blog = $this->blogRepository->update($request, $id);
        $this->photoRepository->update($request, $blog);
        return redirect()->route('user_blogs.index');
    }


    public function destroy($id)
    {
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
        return redirect()->route('user_blogs.index');
    }

}