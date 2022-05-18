<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogValidation;
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


    public function store(CreateBlogValidation $request)
    {
        store_blog($request, $this->blogRepository, $this->photoRepository);
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
        update_blog($request, $id, $this->blogRepository, $this->photoRepository);
        return redirect()->route('user_blogs.index');
    }


    public function destroy($id)
    {
        destroy_blog($id, $this->blogRepository, $this->photoRepository);
        return redirect()->route('user_blogs.index');
    }

}