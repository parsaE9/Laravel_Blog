<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;

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
        $this->blogRepository = $blogRepository;
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

}
