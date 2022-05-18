<?php

namespace App\Repositories;


interface BlogRepositoryInterface
{
    public function all();

    public function user_blogs();

    public function find($id);

    public function create($request);
}