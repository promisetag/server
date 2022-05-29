<?php

namespace App\Http\Controllers;

use App\Models\TourPage;
use Illuminate\Http\Request;

class GetTourPagesController extends Controller
{
    public function __invoke(Request $request)
    {
        return TourPage::where('active', true)
            ->select('id')
            ->addSelect('background_color')
            ->addSelect('image_url')
            ->addSelect('title')
            ->addSelect('subtitle')
            ->get();
    }
}
