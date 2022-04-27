<?php

namespace App\Repositories;

interface PhotoRepositoryInterface
{
    public function save($request, $blog);

    public function update($request, $blog);

    public function destroy($id);
}