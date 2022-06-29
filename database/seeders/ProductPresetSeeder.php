<?php

namespace Database\Seeders;

use Domain\Products\Models\ProductPreset;
use Domain\Products\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Schema;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductPresetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductPreset::truncate();
        Tag::truncate();
        DB::table('taggables')->truncate();
        Media::where('model_type', ProductPreset::class)->delete();

        $tags = Tag::factory(6)->create();

        $presets = ProductPreset::factory(10)
            ->hasAttached($tags->random(5))
            ->create(['product_id' => 1]);

        foreach ($presets as $index => $preset) {
            $imageNo = ($index % 4) + 1;
            $preset->addMedia(public_path("images/test/product-preset-00$imageNo.png"))
                ->preservingOriginal()
                ->toMediaCollection('images');
        }
    }
}
