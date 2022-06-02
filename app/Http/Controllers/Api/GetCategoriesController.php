<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class GetCategoriesController extends Controller
{
    public function __invoke(Request $request)

    {
        return Category::where('active', true)
            ->select('id')
            ->addSelect('title')
            ->addSelect('description')
            ->addSelect('image_url')
            ->addSelect('background_color')
            ->addSelect('background_image_url')
            ->addSelect('tag_quantity')
            ->addSelect('storage_space_quantity')
            ->addSelect('storage_space_unit')
            ->get();
    }
}
