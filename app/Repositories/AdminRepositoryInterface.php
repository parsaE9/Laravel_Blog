<?php

namespace App\Repositories;


interface AdminRepositoryInterface
{
    public function all();

    public function find($id);

    public function create($request);
}