<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::get();
        return view('admin.page.index', compact('pages'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'page_name' =>  'required|min:3|unique:pages,name'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        } else {
            $page = new Page;
            $page->name = $request->page_name;
            $page->save();
            return response()->json(['success' => route('admin.page.edit', $page->id)]);
        }
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $page->title = json_decode($page->title, true);
        $page->seo_h1 = json_decode($page->seo_h1, true);
        $page->seo_title = json_decode($page->seo_title, true);
        $page->seo_description = json_decode($page->seo_description, true);
        $page->description = json_decode($page->description, true);
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request)
    {

        $page = Page::find($request->id);

        $validation = [];

        $validation['slug'] = ['required', 'min:3', Rule::unique('pages')->ignore($page->id)];
        $validation['name'] = ['required', 'min:1', Rule::unique('pages')->ignore($page->id)];
        foreach (config('settings.languages') as $language){
            $validation['title.'.$language['code']] = 'required';
            $validation['seo_h1.'.$language['code']] = 'required';
            $validation['seo_title.'.$language['code']] = 'required';
            $validation['seo_description.'.$language['code']] = 'required';
            $validation['description.'.$language['code']] = 'required';
        }

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            // Обновление записи
            $page->name = $request->name;
            $page->slug = $request->slug;
            $page->sort_order = $request->sort_order;
            $page->status = $request->status;

            $row = [];
            foreach (config('settings.languages') as $language) {
                $row['title'][$language['code']] = $request->title[$language['code']];
                $row['seo_h1'][$language['code']] = $request->seo_h1[$language['code']];
                $row['seo_title'][$language['code']] = $request->seo_title[$language['code']];
                $row['seo_description'][$language['code']] = $request->seo_description[$language['code']];
                $row['description'][$language['code']] = $request->description[$language['code']];
            }
            $page->title = $row['title'];
            $page->seo_h1 = $row['seo_h1'];
            $page->seo_title = $row['seo_title'];
            $page->seo_description = $row['seo_description'];
            $page->description = $row['description'];

            $page->save();

            return redirect()->back()->with('success','Успех');
        }
    }

    public function destroy(Request $request)
    {
        if($request->page_id){
            Page::find($request->page_id)->delete();
            return response()->json(['success' => true]);
        }
    }
}
