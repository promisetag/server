<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domain\Products\Models\Product;
use Domain\Products\Resources\ProductResource;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return new ProductResource(
            $product->loadCount('reviews')->loadAvg('reviews', 'rating')
        );
    }
}
