<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $this->middleware('privilege:2');
        $this->blogRepository = $blogRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = $this->blogRepository->all_blogs();
        return view('admin')->with('blogs', $blogs);
    }
}
