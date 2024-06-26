<?php

namespace App\Http\Controllers\Api\Blog;

use App\Jobs\BlogPostAfterDeleteJob;
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
    public function delete(string $id)
    {
        $result = BlogPost::destroy($id); //софт деліт, запис лишається

        //$result = BlogPost::find($id)->forceDelete(); //повне видалення з БД

        if ($result) {
            BlogPostAfterDeleteJob::dispatch($id)->delay(20);
            return response()->json([
                'success' => true,
                'message' => 'Успішно видалено'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Помилка видалення'
            ], 500);
        }
    }
}
