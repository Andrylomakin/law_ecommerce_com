<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ServiceCategoryController;


Route::get('/login', [\App\Http\Controllers\AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthLoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [\App\Http\Controllers\AuthLoginController::class, 'logout'])->name('logout');



Route::group(['prefix' => \App\Http\Middleware\SetLanguage::getLocale()], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/service', [ServiceController::class, 'list'])->name('service.list');
    Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');
    Route::get('/category/{slug}', [ServiceController::class, 'category'])->name('service.category');
    Route::get('/contact', [App\Http\Controllers\IndexController::class, 'contact'])->name('contact');
    Route::view('/success', 'success')->name('success');
    Route::view('/error', 'error')->name('error');

    Route::post('/send-form', [FormController::class, 'sendForm'])->name('send.form');
});



Route::middleware('auth')->group(function () {
    Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    // Service
    Route::get('/admin/service/list', [AdminServiceController::class, 'list'])->name('admin.service.list');
    Route::post('/admin/service/list', [AdminServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/admin/service/create', [AdminServiceController::class, 'create'])->name('admin.service.create');
    Route::get('/admin/service/edit/{id}', [AdminServiceController::class, 'edit'])->name('admin.service.edit');
    Route::get('/admin/service/delete/{id}', [AdminServiceController::class, 'delete'])->name('admin.service.delete');
    Route::get('/admin/service/{service}', [AdminServiceController::class, 'copy'])->name('admin.service.copy');
    Route::post('/admin/service/change/{id}', [AdminServiceController::class, 'change'])->name('admin.service.change');
    Route::post('/admin/service/position/{id}', [AdminServiceController::class, 'checkPosition'])->name('admin.service.position');
    // END Service

    // Service Category
    Route::get('/admin/service/category/list', [ServiceCategoryController::class, 'list'])->name('admin.service.category.list');
    Route::get('/admin/service/category/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('admin.service.category.edit');
    Route::post('/admin/service/category/change/{id}', [ServiceCategoryController::class, 'change'])->name('admin.service.category.change');
    Route::get('/admin/service/category/copy/{serviceCategory}', [ServiceCategoryController::class, 'copy'])->name('admin.service.category.copy');
    Route::get('/admin/service/category/delete/{id}', [ServiceCategoryController::class, 'delete'])->name('admin.service.category.delete');
    Route::post('/admin/service/category/update_sort_order', [ServiceCategoryController::class, 'updateSortOrder'])->name('admin.service.category.update_sort_order');
    // END Service Category




    Route::get('/admin/seo/lading/', [\App\Http\Controllers\Admin\SeoLadingController::class, 'seoIndex'])->name('admin.seo.lading');
    Route::post('/admin/seo/lading/update/{id}', [\App\Http\Controllers\Admin\SeoLadingController::class, 'updateSeoIndex'])->name('admin.seo.lading.update');

    Route::get('/admin/seo/contact/', [\App\Http\Controllers\Admin\SeoLadingController::class, 'seoContact'])->name('admin.seo.contact');
    Route::post('/admin/seo/contact/update/{id}', [\App\Http\Controllers\Admin\SeoLadingController::class, 'updateSeoContact'])->name('admin.seo.contact.update');

    // Settings
    Route::get('/admin/setting/', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::get('/admin/setting/create', [SettingController::class, 'create'])->name('admin.setting.create');
    Route::post('/admin/setting/', [SettingController::class, 'store'])->name('admin.setting.store');
    Route::get('/admin/setting/{id}/edit', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/admin/setting/{id}', [SettingController::class, 'update'])->name('admin.setting.update');
    Route::get('/admin/setting/{id}/destroy', [SettingController::class, 'destroy'])->name('admin.setting.destroy');


    Route::get('/admin/appraisal/list', [\App\Http\Controllers\Admin\AppraisalController::class, 'list'])->name('admin.appraisal.list');
    Route::get('/admin/appraisal/edit/{id}', [\App\Http\Controllers\Admin\AppraisalController::class, 'edit'])->name('admin.appraisal.edit');
    Route::get('/admin/appraisal/copy/{appraisal}', [\App\Http\Controllers\Admin\AppraisalController::class, 'copy'])->name('admin.appraisal.copy');
    Route::get('/admin/appraisal/delete/{id}', [\App\Http\Controllers\Admin\AppraisalController::class, 'delete'])->name('admin.appraisal.delete');
    Route::post('/admin/appraisal/change/{id}', [\App\Http\Controllers\Admin\AppraisalController::class, 'change'])->name('admin.appraisal.change');

    Route::post('admin/translate/from_the_main_language', [\App\Http\Controllers\Admin\TranslateController::class, 'translationFromTheMainLanguage'])->name('admin.translate.from_the_main_language');

    // Localization
    Route::get('/admin/template/localization', [\App\Http\Controllers\Admin\Template\LocalizationController::class, 'index'])->name('admin.template.localization.index');
    Route::post('/admin/template/localization/edit', [\App\Http\Controllers\Admin\Template\LocalizationController::class, 'edit'])->name('admin.template.localization.edit');
});


Route::get('/{lang}', [LanguageController::class, 'index'])->name('lang');
