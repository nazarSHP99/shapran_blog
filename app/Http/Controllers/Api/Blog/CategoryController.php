<?php

namespace App\Http\Controllers\Api\Blog;

use App\Models\BlogCategory;
use App\Http\Controllers\Blog\BaseController;
use function Pest\Laravel\get;


class CategoryController extends BaseController
{
    public function index()
    {
        $paginator = BlogCategory::with(['parentCategory']) -> get();
        return $paginator;
    }
    public function details(string $id)
    {
        $categories = BlogCategory::with(['parentCategory'])->find($id);
        return $categories;
    }
    public function delete(string $id)
    {
        $result = BlogCategory::destroy($id);
        if ($result) {
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
