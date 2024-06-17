<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\SchemaOrg\Schema;

class ServiceController extends Controller
{
    public function list(): View
    {
        $categories = ServiceCategory::query()->orderBy('sort_order')->get();
        $cards = Service::query()->orderBy('position')->get();

        return view('service.list', compact('cards','categories'));
    }

    public function category($slug): View
    {
        $category = ServiceCategory::query()->where('slug', $slug)->first();

        $tabs = ServiceCategory::query()->orderBy('sort_order')->get();

        $cards = Service::query()->orderBy('position')->get();

        $appraisal = Appraisal::query()->get();

        return view('service.category', compact('tabs', 'category', 'cards', 'appraisal'));
    }

    public function show($slug): View
    {
        $card = Service::query()->where('slug',$slug)->first();

        if($card){
            $appraisal = Appraisal::query()->get();

            $schema = Schema::blogPosting()
                ->name($card->name[app()->getLocale()])
                ->description($card->description[app()->getLocale()]);


            return view('service.show', compact('card', 'appraisal', 'schema'));
        }else{
            abort(404);
        }
    }
}
