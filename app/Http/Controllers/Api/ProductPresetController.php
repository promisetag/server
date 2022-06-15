<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Domain\Products\Models\ProductPreset;
use Illuminate\Http\Request;

class ProductPresetController extends Controller
{
    public function index(Product $product)
    {
        $presets = ProductPreset::whereProductId($product->id)->with(['media', 'tags:id,name'])->get();
        return $presets->map(static function($preset) {
            return [
                'id' => $preset->id,
                'title' => $preset->name,
                'image_url' => $preset->media->first()->original_url,
                'tags' => $preset->tags->pluck('name')
            ];
        });
    }
}
