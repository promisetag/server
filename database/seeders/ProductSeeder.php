<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Review::truncate();
        Media::where('model_type', Product::class)->delete();

        $product = Product::create([
            'name' => "The Promise Lovetag",
            'slug' => "the-promise-lovetag",
            'description' => "Real toys left for makers then and should in farther had arranged return in seven. Business parents'. Star was, events, of forward a repeat troubled caution like so universal little. Best term every their it that with involved. Lift times, then their he epic I many to and deep follow.",
            'base_price' => '2349',
            'quantity_threshold' => 15,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $product->reviews()->attach(Review::factory(40)->create());

        $product->addMedia(public_path('images/test/product_image_001.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('images');
        $product->addMedia(public_path('images/test/product_image_002.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('images');
        $product->addMedia(public_path('images/test/product_image_003.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('images');

        $categories = Category::all();

        $product->categories()->sync($categories->pluck('id')->toArray());
    }
}
