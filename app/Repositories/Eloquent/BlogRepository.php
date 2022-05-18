<?php

namespace App\Repositories\Eloquent;


use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{

    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }


    public function all()
    {
        return $this->model->paginate(2);
    }


    public function user_blogs()
    {
        return $this->model->where('user_id', Auth::id())->paginate(2);
    }


    public function find($id)
    {
        return $this->model->findOrFail($id);
    }


    public function create($request)
    {
        $validated = $request->validated();

        $blog = $this->model->newInstance();
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

        $blog = $this->model->findOrFail($id);

        $blog->title = $validated['title'];
        $blog->short_description = $validated['short_description'];
        $blog->long_description = $validated['long_description'];
        $blog->status = $validated['status'];
        $blog->save();

        return $blog;
    }


    public function destroy($id)
    {
        $blog = $this->model->findOrFail($id);
        $blog->title = $blog->title . "_deleted_" . $blog->id;
        $blog->save();
        $blog->delete();
    }

}