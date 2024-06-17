<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\SeoContact;
use App\Models\SeoLading;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index():View
    {
        $categories = ServiceCategory::query()->orderBy('sort_order')->get();
        $cards = Service::query()->orderBy('position')->get();
        $seo = SeoLading::query()->first();
        $appraisal = Appraisal::query()->get();

        return view('index', compact('categories', 'cards', 'seo', 'appraisal'));
    }

    public function contact(): View
    {
        $seo = SeoContact::query()->first();

        return view('contact', compact('seo'));
    }
}
