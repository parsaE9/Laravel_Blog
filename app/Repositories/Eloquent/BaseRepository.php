<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements EloquentRepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


//    public function create($request)
//    {
//        $this->model->create($request);
//    }


    public function update($request, $param)
    {
        $this->model->update($request);
    }


    public function destroy($id)
    {
        $this->model->delete($id);
    }
}