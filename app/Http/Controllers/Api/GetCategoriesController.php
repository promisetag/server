<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domain\Products\Models\Category;
use Domain\Products\Resources\CategoryResource;
use Illuminate\Http\Request;

class GetCategoriesController extends Controller
{
    public function __invoke(Request $request)

    {
        return CategoryResource::collection(
            Category::query()
                ->with('media')
                ->active()
                ->selectAttributesForProductPage()
                ->get()
        );
    }
}
