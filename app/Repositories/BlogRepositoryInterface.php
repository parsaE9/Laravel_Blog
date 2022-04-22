<?php

namespace App\Repositories;

use App\Http\Requests\StoreBlogValidation;
use App\Http\Requests\UpdateBlogValidation;

interface BlogRepositoryInterface
{
    public function all_blogs();

    public function user_blogs();

    public function store(StoreBlogValidation $request);

    public function show($id);

    public function edit($id);

    public function update(UpdateBlogValidation $request, $id);

    public function destroy($id);
}