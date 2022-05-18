<?php

namespace App\Repositories;

interface PhotoRepositoryInterface
{
    public function create($request, $blog);
}