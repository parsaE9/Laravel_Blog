<?php

namespace App\Repositories;


interface EloquentRepositoryInterface
{
//    public function create($request);

    public function update($request, $param);

    public function destroy($id);
}