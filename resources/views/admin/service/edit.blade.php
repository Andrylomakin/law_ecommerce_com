@extends('admin.layouts.layout')



@section('content')
    @include('admin.layouts.alerts._success')
    @include('admin.layouts.alerts._errors')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Создание услуги</h5>
                </div>
            </div>
        </div>
        <form action="{{ isset($service) ? route('admin.service.change', $service->id) : route('admin.service.store') }}" method="post" enctype="multipart/form-data" data-tabs class="tabs-admin">
            @csrf
            <nav data-tabs-titles class="tabs-admin__navigation">
                @foreach(config('settings.languages') as $language)
                    <button type="button" class="tabs-admin__title {{ $loop->index == 0 ? '_tab-active' : '' }}">
                        {{ $language['title'] }}
                    </button>
                @endforeach
            </nav>
            <div data-tabs-body class="tabs-admin__content">

                @foreach(config('settings.languages') as $language)
                    <div class="tabs-admin__body card-body bg-light">
                        <div class="tab-content">
                            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label" for="name_{{ $language['code'] }}">
                                            Название*
                                        </label>
                                        <div class="input-group mb-3">
                                        <input class="form-control"
                                               id="name_{{ $language['code'] }}"
                                               value="{{ isset($service->name[$language['code']]) ? $service->name[$language['code']] : old("name.{$language['code']}") }}"
                                               name="name[{{ $language['code'] }}]"
                                               type="text">
                                            @if($language['code'] != config('settings.mainLanguageAdmin'))
                                                <button class="btn btn-outline-secondary"
                                                        onclick="translationFromTheMainLanguage(this, '{{$language['code']}}', '{{$language['translate']}}');"
                                                        type="button">
                                                    {{ config('settings.mainLanguageAdmin').'-'.$language['translate'] }}
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="preview_name_{{ $language['code'] }}">
                                            Превью*
                                        </label>
                                        @if($language['code'] != config('settings.mainLanguageAdmin'))
                                            <button class="btn btn-outline-secondary"
                                                    onclick="translationFromTheMainLanguage(this, '{{$language['code']}}', '{{$language['translate']}}');"
                                                    type="button">
                                                {{ config('settings.mainLanguageAdmin').'-'.$language['translate'] }}
                                            </button>
                                        @endif
                                        <textarea class="form-control"
                                                  id="message-preview-{{ $language['code'] }}"
                                                  name="preview_name[{{ $language['code'] }}]"
                                                  type="text">{!! isset($service->preview_name[$language['code']]) ? $service->preview_name[$language['code']] :old("preview_name.{$language['code']}") !!}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="description_{{ $language['code'] }}">
                                            Описание*
                                        </label>
                                        @if($language['code'] != config('settings.mainLanguageAdmin'))
                                            <button class="btn btn-outline-secondary"
                                                    onclick="translationFromTheMainLanguage(this, '{{$language['code']}}', '{{$language['translate']}}');"
                                                    type="button">
                                                {{ config('settings.mainLanguageAdmin').'-'.$language['translate'] }}
                                            </button>
                                        @endif
                                        <textarea class="form-control"
                                                  id="message-description-{{ $language['code'] }}"
                                                  name="description[{{ $language['code'] }}]"
                                                  type="text">{!! isset($service->description[$language['code']]) ? $service->description[$language['code']] : old("description.{$language['code']}")  !!}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="title_{{ $language['code'] }}">
                                            SEO Title*
                                        </label>
                                        <div class="input-group mb-3">
                                        <input class="form-control"
                                               id="title_{{ $language['code'] }}"
                                               value="{{ isset($service->seo_title[$language['code']]) ? $service->seo_title[$language['code']] : old("seo.title.{$language['code']}") }}"
                                               name="seo[title][{{ $language['code'] }}]"
                                               type="text">
                                        @if($language['code'] != config('settings.mainLanguageAdmin'))
                                            <button class="btn btn-outline-secondary"
                                                    onclick="translationFromTheMainLanguage(this, '{{$language['code']}}', '{{$language['translate']}}');"
                                                    type="button">
                                                {{ config('settings.mainLanguageAdmin').'-'.$language['translate'] }}
                                            </button>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="title_{{ $language['code'] }}">
                                            Seo Description*
                                        </label>
                                        <div class="input-group mb-3">
                                        <input class="form-control"
                                               id="meta_desc_{{ $language['code'] }}"
                                               value="{{ isset($service->seo_description[$language['code']]) ? $service->seo_description[$language['code']] : old("seo.description.{$language['code']}") }}"
                                               name="seo[description][{{ $language['code'] }}]"
                                               type="text">
                                            @if($language['code'] != config('settings.mainLanguageAdmin'))
                                                <button class="btn btn-outline-secondary"
                                                        onclick="translationFromTheMainLanguage(this, '{{$language['code']}}', '{{$language['translate']}}');"
                                                        type="button">
                                                    {{ config('settings.mainLanguageAdmin').'-'.$language['translate'] }}
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="title_{{ $language['code'] }}">
                                            Seo Text*
                                        </label>
                                        @if($language['code'] != config('settings.mainLanguageAdmin'))
                                            <button class="btn btn-outline-secondary"
                                                    onclick="translationFromTheMainLanguage(this, '{{$language['code']}}', '{{$language['translate']}}');"
                                                    type="button">
                                                {{ config('settings.mainLanguageAdmin').'-'.$language['translate'] }}
                                            </button>
                                        @endif
                                        <textarea class="form-control"
                                                  id="message-seo-{{ $language['code'] }}"
                                                  name="seo[text][{{ $language['code'] }}]"
                                                  type="text">{!! isset($service->seo_text[$language['code']]) ? $service->seo_text[$language['code']] : old("seo.text.{$language['code']}") !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-header">
                <div class="row">

                    <div class="col-md-12">
                        <label class="form-label" for="category">
                           Категория
                        </label>
                        <select class="form-control" id="category" name="category" type="text">
                            @foreach($categories as $category)
                                @if(isset($service))
                                    <option value="{{ $category->id }}" @if($category->id == $service->category_id) selected @endif>{{ $category->name['ru'] }}</option>
                                @else
                                    <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>{{ $category->name['ru'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Прайс*
                        </label>
                        <input class="form-control"
                               id="title"
                               value="{{ isset($service->price) ? $service->price : old('price') }}" name="price"
                               type="text">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Оценка*
                        </label>
                        <input class="form-control" id="title" value="{{ isset($service->rating) ? $service->rating : old('rating') }}" name="rating"
                               type="text">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Количетсво отзывов*
                        </label>
                        <input class="form-control" id="title" value="{{ isset($service->review) ? $service->review : old('review') }}" name="review"
                               type="text">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Slug*
                        </label>
                        <input class="form-control" id="title" value="{{ isset($service->slug) ? $service->slug : old('slug') }}" name="slug"
                               type="text">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="so">
                            So*
                        </label>
                        <input class="form-control" id="so" value="{{ isset($service->so) ? $service->so : old('so') }}" name="so" type="text">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Фото*
                        </label>
                        <input class="form-control" id="title" name="photo"
                               type="file">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Фото  (Mobile)*
                        </label>
                        <input class="form-control" id="title" name="photo_mobile"
                               type="file">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Иконка*
                        </label>
                        <input class="form-control" id="title" name="icon"
                               type="file">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="navigation-buttons">
                        <button class="btn btn-success me-1 mb-1">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        @foreach(config('settings.languages') as $language)
        CKEDITOR.replace('message-preview-{{ $language['code'] }}', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
        CKEDITOR.replace('message-description-{{ $language['code'] }}', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
        CKEDITOR.replace('message-seo-{{ $language['code'] }}', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
        @endforeach
    </script>

@endsection
