<?php

namespace App\Repositories;

interface PhotoRepositoryInterface
{
    public function create($request, $blog);

    public function update($request, $blog);

    public function destroy($id);
}