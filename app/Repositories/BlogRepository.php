<?php

namespace App\Repositories;


use App\Blog;
use App\Http\Requests\UpdateBlogValidation;
use App\Photo;
use App\Http\Requests\StoreBlogValidation;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
    public function all_blogs()
    {
        return Blog::all();
    }


    public function user_blogs()
    {
        return Blog::where('user_id', Auth::id())->get();
    }


    public function store(StoreBlogValidation $request)
    {
        $validated = $request->validated();

        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->short_description = $validated['short_description'];
        $blog->long_description = $validated['long_description'];
        $blog->status = $validated['status'];
        $blog->user_id = Auth::id();
        $blog->save();

        foreach ($request->file('images') as $image) {
            $image_name = $image->getClientOriginalName();
            $image->storeAs('images', $image_name, 'public');
            $photo = new Photo();
            $photo->path = '/storage/images/' . $image_name;
            $blog->photos()->save($photo);
        }
    }


    public function show($id)
    {
        return Blog::findOrFail($id);
    }


    public function edit($id)
    {
        return Blog::find($id);
    }


    public function update(UpdateBlogValidation $request, $id)
    {
        $validated = $request->validated();

        $blog = Blog::find($id);

        $blog->title = $validated['title'];
        $blog->short_description = $validated['short_description'];
        $blog->long_description = $validated['long_description'];
        $blog->status = $validated['status'];
        $blog->photos()->delete();
        $blog->save();

        if ($request->has('previous_images')) {
            foreach ($request->get('previous_images') as $image) {
                $photo = new Photo();
                $photo->path = str_replace("http://127.0.0.1:8000", "", $image);
                $blog->photos()->save($photo);
            }
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = $image->getClientOriginalName();
                $image->storeAs('images', $image_name, 'public');
                $photo = new Photo();
                $photo->path = '/storage/images/' . $image_name;
                $blog->photos()->save($photo);
            }
        }
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->photos()->delete();
        $blog->delete();
    }
}