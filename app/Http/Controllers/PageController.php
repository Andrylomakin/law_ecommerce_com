<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show($slug): View
    {
        $page = Page::query()
            ->where('slug', '=', $slug)
            ->first();

        if($page){
            return view('page.show', compact('page'));
        }else{
            abort(404);
        }
    }
}
