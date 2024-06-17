<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appraisal;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class AppraisalController extends Controller
{
    public function list(): View
    {
        $appraisals = Appraisal::query()->get();

        return view('admin.appraisal.list', compact('appraisals'));
    }

    public function edit($id): View
    {
        $appraisal = Appraisal::query()->where('id',$id)->first();

        return view('admin.appraisal.edit', compact('appraisal'));
    }

    public function change($id, Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'rating' => 'required',
                'photo' => 'nullable',
            ]
        );

        $appraisal = Appraisal::query()->where('id',$id)->first();

        $row = [
            'name' => $data['name'],
            'preview' => '-',
            'description' => $data['description'],
            'rating' => $data['rating'],
            'photo' => $this->uploadPhoto($request->file('photo')) ?? $appraisal->photo,
        ];

        $appraisal->update($row);

        return redirect()->back()->with('success','Успешно');
    }


    public function copy(Appraisal $appraisal): RedirectResponse
    {
        $newService = $appraisal
            ->replicate();

        $newService->save();

        return redirect()
            ->route('admin.appraisal.edit', $newService->id)
            ->with('success', 'Новая карточка готова к редактированию!');
    }

    public function delete($id): RedirectResponse
    {
        Appraisal::query()->where('id',$id)->delete();

        return redirect()->back()->with('success','Успех');
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
