<?php

namespace Database\Seeders;

use App\Models\TourPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TourPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        TourPage::truncate();
        Media::where('model_type', TourPage::class)->delete();
        $pages = TourPage::factory(3)->create();

        foreach ($pages as $page) {
            $page->addMedia(public_path('images/test/onboarding-image-preview.png'))
                ->preservingOriginal()
                ->toMediaCollection('images');
        }
    }
}
