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


    public function create($data)
    {
        $validated = $data->validated();

        $model = $this->model->newInstance([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'privilege' => $validated['privilege'],
            'password' => bcrypt($validated['password'])
        ]);

        $model->save();
        return $model->id;
    }


    public function update($request, $param)
    {
        $this->model->find($param)->update($request);
    }


    public function destroy($id)
    {
        $this->model->find($id)->delete();
    }
}