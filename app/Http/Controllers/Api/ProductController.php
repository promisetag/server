<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    public function show(Product $product): array
    {
        /** @var $media Media[] */
        $media = $product->getMedia('images');
        $images = [];
        foreach ($media as $mediaItem) {
            $images[] = [
                'id' => $mediaItem->id,
                'image_url' => $mediaItem->getUrl(),
                'thumbnail_url' => $mediaItem->getUrl('thumb')
            ];
        }

        $product['images'] = $images;

        return $product->loadCount('reviews')
            ->loadAvg('reviews', 'rating')
            ->only([
                'id',
                'name',
                'description',
                'base_price',
                'quantity_threshold',
                'variations',
                'images',
                'reviews_count',
                'reviews_avg_rating'
            ]);
    }
}
