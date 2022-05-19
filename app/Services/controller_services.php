<?php


function store_blog($request, $blogRepository, $photoRepository)
{
    $blog = $blogRepository->create($request);
    $data = [$request, $blog];
    $photoRepository->create($data);
}


function update_blog($request, $id, $blogRepository, $photoRepository)
{
    $blog = $blogRepository->update($request, $id);
    $photoRepository->update($request, $blog);
}


function destroy_blog($id, $blogRepository, $photoRepository)
{
    $photoRepository->destroy($id);
    $blogRepository->destroy($id);
}


function store_admin($request, $adminRepository, $privilegeRepository)
{
    $admin_id = $adminRepository->create($request);
    $data = [$request, $admin_id];
    $privilegeRepository->create($data);
}


function update_admin($request, $id, $adminRepository, $privilegeRepository)
{
    $admin_id = $adminRepository->update($request, $id);
    $privilegeRepository->update($request, $admin_id);
}


function destroy_admin($id, $adminRepository, $privilegeRepository)
{
    $privilegeRepository->destroy($id);
    $adminRepository->destroy($id);
}


function destroy_user($id, $userRepository, $blogRepository, $photoRepository)
{
    $user_blogs_IDs = $userRepository->destroy($id);
    foreach ($user_blogs_IDs as $user_blog_ID){
        $photoRepository->destroy($user_blog_ID);
        $blogRepository->destroy($user_blog_ID);
    }
}
