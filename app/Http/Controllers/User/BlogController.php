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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->user_blogs();
        return view('user.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogValidation $request)
    {
        $blog = $this->blogRepository->save($request);
        $this->photoRepository->save($request, $blog);
        return redirect()->route('user_blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogRepository->find($id);
        Gate::authorize('view-update-blog', $blog);
        return view('user.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);
        Gate::authorize('view-update-blog', $blog);
        return view('user.edit')->with('blog', $blog);
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
        $blog = $this->blogRepository->update($request, $id);
        $this->photoRepository->update($request, $blog);
        return redirect()->route('user_blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->photoRepository->destroy($id);
        $this->blogRepository->destroy($id);
        return redirect()->route('user_blogs.index');
    }

}