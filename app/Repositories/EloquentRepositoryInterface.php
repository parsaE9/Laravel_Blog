<?php

namespace App\Repositories;


interface EloquentRepositoryInterface
{
    public function create($data);

    public function update($request, $param);

    public function destroy($id);
}