<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function list(): View
    {
        $services = Service::query()->get();

        return view('admin.service.list', compact('services'));
    }

    public function edit($id): View
    {
        $service = Service::query()->where('id', $id)->first();
        $categories = ServiceCategory::query()->get();

        return view('admin.service.edit', compact('service', 'categories'));
    }

    public function change($id, Request $request)
    {

        $validation = [];
        foreach (config('settings.languages') as $language){
            $validation['name.'.$language['code']] = 'required';
            $validation['preview_name.'.$language['code']] = 'required';
            $validation['description.'.$language['code']] = 'required';
            $validation['seo.title.'.$language['code']] = 'required';
            $validation['seo.description.'.$language['code']] = 'required';
            $validation['seo.text.'.$language['code']] = 'required';
        }
        $validation['price'] = 'required';
        $validation['icon'] = 'nullable';
        $validation['photo'] = 'nullable';
        $validation['slug'] = 'required';
        $validation['so'] = 'required';
        $validation['category'] = 'required';
        $validation['rating'] = 'required';
        $validation['review'] = 'required';

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $service = Service::query()->where('id', $id)->first();

            $row = [];
            foreach (config('settings.languages') as $language){
                $row['name'][$language['code']] = $request->name[$language['code']];
                $row['preview_name'][$language['code']] = $request->preview_name[$language['code']];
                $row['description'][$language['code']] = $request->description[$language['code']];
                $row['seo_title'][$language['code']] = $request->seo['title'][$language['code']];
                $row['seo_description'][$language['code']] = $request->seo['description'][$language['code']];
                $row['seo_text'][$language['code']] = $request->seo['text'][$language['code']];
            }
            $row['price'] = $request->price;
            $row['icon'] = $this->uploadPhoto($request->file('icon')) ?? $service->icon;
            $row['photo'] = $this->uploadPhoto($request->file('photo')) ?? $service->photo;
            $row['photo_mobile'] = $this->uploadPhoto($request->file('photo_mobile')) ?? $service->photo;
            $row['rating'] = $request->rating;
            $row['review'] = $request->review;
            $row['slug'] = $request->slug;
            $row['so'] = $request->so;
            $row['category_id'] = $request->category;

            $service->update($row);
            return redirect()->back()->with('success', 'Данные успешно обновлены');

        }
    }

    public function copy(Service $service): RedirectResponse
    {
        $newService = $service
            ->replicate();

        $newService->save();

        return redirect()
            ->route('admin.service.edit', $newService->id)
            ->with('success', 'Новая карточка готова к редактированию!');
    }

    public function create()
    {
        $categories = ServiceCategory::query()->get();

        return view('admin.service.edit', compact('categories'));
    }

    public function store(Request $request)
    {
        $validation = [];
        foreach (config('settings.languages') as $language){
            $validation['name.'.$language['code']] = 'required';
            $validation['preview_name.'.$language['code']] = 'required';
            $validation['description.'.$language['code']] = 'required';
            $validation['seo.title.'.$language['code']] = 'required';
            $validation['seo.description.'.$language['code']] = 'required';
            $validation['seo.text.'.$language['code']] = 'required';
        }
        $validation['price'] = 'required';
        $validation['icon'] = 'nullable';
        $validation['photo'] = 'nullable';
        $validation['slug'] = 'required';
        $validation['so'] = 'required';
        $validation['category'] = 'required';
        $validation['rating'] = 'required';
        $validation['review'] = 'required';

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $service = new Service();

            $service->name = $request->name;
            $service->preview_name = $request->preview_name;
            $service->description = $request->description;
            $service->seo_title = $request->seo['title'];
            $service->seo_description = $request->seo['description'];
            $service->seo_text = $request->seo['text'];
            $service->price = $request->price;
            $service->icon = $this->uploadPhoto($request->file('icon')) ?? '';
            $service->photo = $this->uploadPhoto($request->file('photo')) ?? '';
            $service->photo_mobile = $this->uploadPhoto($request->file('photo_mobile')) ?? '';
            $service->rating = $request->rating;
            $service->review = $request->review;
            $service->slug = $request->slug;
            $service->so = $request->so;
            $service->category_id = $request->category;

            $service->save();

            return redirect()->back()->with('success', 'Услуга '.$request->name[config('settings.mainLanguageAdmin')].' успешно создана');
        }

    }

    public function delete($id): RedirectResponse
    {
        Service::query()->where('id',$id)->delete();

        return redirect()->back()->with('success','Успех');
    }

    public function checkPosition($id, Request $request): RedirectResponse
    {
        $category = Service::query()->where('id',$id)->first();

        $category->update(['position' => $request->get('position')]);

        return redirect()->back();
    }

    private function uploadPhoto(?UploadedFile $photo): ?string
    {
        if ($photo === null) {
            return null;
        }

        $uploadFolder = 'public/service';

        $previewPhotoFilename = $photo->store($uploadFolder);
        $previewPhotoFilename = str_replace($uploadFolder . '/', '', $previewPhotoFilename);

        return $previewPhotoFilename;
    }
}
