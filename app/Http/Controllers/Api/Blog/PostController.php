<?php

namespace App\Http\Controllers\Api\Blog;

use App\Models\BlogPost;
use App\Http\Controllers\Blog\BaseController;


class PostController extends BaseController
{
    public function index()
    {
        $posts = BlogPost::with(['user', 'category'])->get();

        return $posts;
    }
    public function details(string $id)
    {
        $posts = BlogPost::with(['user', 'category'])->find($id);
        return $posts;
    }
}
