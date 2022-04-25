<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogValidation;
use App\Http\Requests\UpdateBlogValidation;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    /**
     * @var BlogRepositoryInterface
     */
    private $blogRepository;

    /**
     * Create a new controller instance.
     *
     * @param BlogRepositoryInterface $blogRepository
     */
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->middleware('auth');
        $this->middleware('privilege:1');
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->user_blogs();
        return view('blogs.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogValidation $request)
    {
        $this->blogRepository->store($request);
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogRepository->show($id);
        Gate::authorize('view-update-blog', $blog);
        return view('blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->edit($id);
        Gate::authorize('view-update-blog', $blog);
        return view('blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBlogValidation $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogValidation $request, $id)
    {
        $this->blogRepository->update($request, $id);
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogRepository->destroy($id);
        return redirect()->route('blogs.index');
    }

}