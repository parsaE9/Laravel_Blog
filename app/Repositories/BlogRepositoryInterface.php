<?php

namespace App\Repositories;


interface BlogRepositoryInterface
{
    public function all_blogs();

    public function user_blogs();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}