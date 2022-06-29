<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Schema;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Media::where('model_type', Category::class)->delete();

        $categories = Category::factory(3)->create();

        foreach($categories as $index => $category) {
            $imageNo = ($index % 3) + 1;
            $category->addMedia(public_path("images/test/category-bg-$imageNo.jpg"))
            ->preservingOriginal()
            ->toMediaCollection('bg');

            $category->addMedia(public_path("images/test/couple.png"))
            ->preservingOriginal()
            ->toMediaCollection('images');
        }
    }
}
