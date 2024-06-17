<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ServiceCategoryController extends Controller
{
    public function list(): View
    {
        $categories = ServiceCategory::query()->get();

        return view('admin.service.category.list', compact('categories'));
    }

    public function edit($id)
    {
        $category = ServiceCategory::query()->where('id', $id)->first();

        return view('admin.service.category.edit', compact('category'));
    }

    public function change($id, Request $request){
        $validation = [];
        foreach (config('settings.languages') as $language){
            $validation['name.'.$language['code']] = 'required';
            $validation['seo.title.'.$language['code']] = 'required';
            $validation['seo.description.'.$language['code']] = 'required';
            $validation['seo.text.'.$language['code']] = 'required';
        }
        $validation['slug'] = 'required';

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $service = ServiceCategory::query()->where('id', $id)->first();
            $row = [];
            foreach (config('settings.languages') as $language){
                $row['name'][$language['code']] = $request->name[$language['code']];
                $row['seo_title'][$language['code']] = $request->seo['title'][$language['code']];
                $row['seo_description'][$language['code']] = $request->seo['description'][$language['code']];
                $row['seo_text'][$language['code']] = $request->seo['text'][$language['code']];
            }
            $row['slug'] = $request->slug;

            $service->update($row);
            return redirect()->back()->with('success','Успех');
        }
    }

    public function copy(ServiceCategory $serviceCategory): RedirectResponse
    {
        $newService = $serviceCategory
            ->replicate();

        $newService->save();

        return redirect()
            ->route('admin.service.category.edit', $newService->id)
            ->with('success', 'Новая категория готова к редактированию!');
    }

    public function delete($id)
    {
        // Проверяем, есть ли связанные записи в таблице services
        $servicesCount = Service::where('category_id', $id)->count();

        // Если есть связанные записи, вы можете выполнить какие-то действия,
        // например, вернуть сообщение об ошибке, что категорию нельзя удалить
        if ($servicesCount > 0) {
            return redirect()->back()->with('success', 'Невозможно удалить категорию, так как существуют связанные услуги (удалите или перенсите карты');
        }

        // Если нет связанных записей, то можно удалить категорию
        ServiceCategory::query()->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена');
    }

    public function updateSortOrder(Request $request)
    {
        $category = ServiceCategory::find($request->id);
        $category->sort_order = $request->sort_order;
        $category->update();

        return response()->json(['success' => true], 200);
    }


}
