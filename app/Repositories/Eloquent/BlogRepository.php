<?php

namespace App\Repositories\Eloquent;


use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return Blog::paginate(2);
    }


    public function user_blogs()
    {
        return Blog::where('user_id', Auth::id())->paginate(2);
    }


    public function find($id)
    {
        return Blog::findOrFail($id);
    }


    public function save($request)
    {
        $validated = $request->validated();

        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->short_description = $validated['short_description'];
        $blog->long_description = $validated['long_description'];
        $blog->status = $validated['status'];
        $blog->user_id = Auth::id();
        $blog->save();

        return $blog;
    }


    public function update($request, $id)
    {
        $validated = $request->validated();

        $blog = Blog::findOrFail($id);

        $blog->title = $validated['title'];
        $blog->short_description = $validated['short_description'];
        $blog->long_description = $validated['long_description'];
        $blog->status = $validated['status'];

        # TODO delete photo file when editing
//        $this->delete_file($blog);
        $blog->photos()->delete();
        $blog->save();

        return $blog;
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $blog->title . "_deleted_" . $blog->id;
        $blog->save();
//        $this->delete_file($blog);
        $blog->delete();
    }


//    private function delete_file($blog){
//        foreach ($blog->photos as $photo){
//            File::delete(public_path($photo->path));
//        }
//    }

}