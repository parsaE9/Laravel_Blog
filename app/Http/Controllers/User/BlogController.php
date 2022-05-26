<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogValidation;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use App\Services\BlogServices;
use Illuminate\Support\Facades\Gate;


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
        $blogs = $this->blogRepository->user_blogs();
        return view('user.index')->with('blogs', $blogs);
    }


    public function create()
    {
        return view('user.create');
    }


    public function store(CreateBlogValidation $request)
    {
        $this->blogServices->create($request);
        return redirect()->route('user_blogs.index');
    }


    public function show($id)
    {
        $blog = $this->blogRepository->find($id);
        Gate::authorize('user-view-update-blog', $blog);
        return view('user.show')->with('blog', $blog);
    }


    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);
        Gate::authorize('user-view-update-blog', $blog);
        return view('user.edit')->with('blog', $blog);
    }


    public function update(UpdateBlogValidation $request, $id)
    {
        $this->blogServices->update($request, $id);
        return redirect()->route('user_blogs.index');
    }


    public function destroy($id)
    {
        $this->blogServices->delete($id);
        return redirect()->route('user_blogs.index');
    }

}