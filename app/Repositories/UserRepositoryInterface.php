<?php

namespace App\Repositories;


interface UserRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($request);

    public function update($request, $id);

    public function destroy($id);
}