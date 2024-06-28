@extends('admin.layouts.layout')

@section('title')
    {{ Str::ucfirst(trans('messages.general.defenders')) }}
@endsection

@section('content')
    @include('admin.layouts.alerts._success')
    @include('admin.layouts.alerts._errors')
    <div class="card">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Страница #{{ $page->id }}</h5>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" form="page-update">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('admin.page.update', $page->id) }}" method="post"
                  enctype="multipart/form-data" id="page-update" data-tabs class="tabs-admin">
                <input type="hidden" name="id" value="{{ $page->id }}">
                @csrf
                <div class="col-md-12">
                    <label class="form-label" for="name">
                        Название*
                    </label>
                    <div class="input-group mb-3">
                        <input class="form-control"
                               id="name"
                               value="{{ isset($page->name) ? $page->name : '' }}"
                               name="name"
                               type="text">
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="slug">
                        Slug*
                    </label>
                    <div class="input-group mb-3">
                        <input class="form-control"
                               id="slug"
                               value="{{ isset($page->slug) ? $page->slug : '' }}"
                               name="slug"
                               type="text">
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="sort_order">
                        Сортировка *
                    </label>
                    <div class="input-group mb-3">
                        <input class="form-control"
                               id="sort_order"
                               value="{{ isset($page->sort_order) ? $page->sort_order : 0 }}"
                               name="sort_order"
                               type="number">
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="status">
                        Статус *
                    </label>
                    <div class="input-group mb-3">
                        <select name="status" class="form-control" id="status">
                            @if($page->status)
                                <option value="1" selected>Включено</option>
                                <option value="0">Выключено</option>
                            @else
                                <option value="1">Включено</option>
                                <option value="0" selected>Выключено</option>
                            @endif
                        </select>
                    </div>
                </div>

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
                                            <label class="form-label" for="title_{{ $language['code'] }}">
                                                Название страницы*
                                            </label>
                                            <div class="input-group mb-3">
                                                <input class="form-control"
                                                       id="title_{{ $language['code'] }}"
                                                       value="{{ isset($page->title[$language['code']]) ? $page->title[$language['code']] : '' }}"
                                                       name="title[{{ $language['code'] }}]"
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
                                            <label class="form-label" for="seo_h1_{{ $language['code'] }}">
                                                Seo h1*
                                            </label>
                                            <div class="input-group mb-3">
                                                <input class="form-control"
                                                       id="seo_h1_{{ $language['code'] }}"
                                                       value="{{ isset($page->seo_h1[$language['code']]) ? $page->seo_h1[$language['code']] : '' }}"
                                                       name="seo_h1[{{ $language['code'] }}]"
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
                                                SEO Title*
                                            </label>
                                            <div class="input-group mb-3">
                                                <input class="form-control"
                                                       id="title_{{ $language['code'] }}"
                                                       value="{{ isset($page->seo_title[$language['code']]) ? $page->seo_title[$language['code']] : '' }}"
                                                       name="seo_title[{{ $language['code'] }}]"
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
                                                       value="{{ isset($page->seo_description[$language['code']]) ? $page->seo_description[$language['code']] : '' }}"
                                                       name="seo_description[{{ $language['code'] }}]"
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
                                                      id="message-{{ $language['code'] }}"
                                                      name="description[{{ $language['code'] }}]"
                                                      type="text">{!! isset($page->description[$language['code']]) ? $page->description[$language['code']] : ''  !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        @foreach(config('settings.languages') as $language)
        CKEDITOR.replace('message-{{ $language['code'] }}', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
        @endforeach
    </script>
@endsection
