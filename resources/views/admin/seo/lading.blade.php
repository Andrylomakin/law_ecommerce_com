@extends('admin.layouts.layout')



@section('content')
    @include('admin.layouts.alerts._success')
    @include('admin.layouts.alerts._errors')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">SEO Главная</h5>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.seo.lading.update',1) }}" method="post" enctype="multipart/form-data" data-tabs class="tabs-admin">
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
                                        <label class="form-label" for="title_{{ $language['code'] }}">
                                            SEO Title*
                                        </label>
                                        <div class="input-group mb-3">
                                            <input class="form-control"
                                                   id="title_{{ $language['code'] }}"
                                                   value="{{ isset($seo->seo_title[$language['code']]) ? $seo->seo_title[$language['code']] : '' }}"
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
                                                   value="{{ isset($seo->seo_description[$language['code']]) ? $seo->seo_description[$language['code']] : '' }}"
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
                                                  id="message-{{ $language['code'] }}"
                                                  name="seo[text][{{ $language['code'] }}]"
                                                  type="text">{!! isset($seo->seo_text[$language['code']]) ? $seo->seo_text[$language['code']] : ''  !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-header">
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
        CKEDITOR.replace('message-{{ $language['code'] }}', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
        @endforeach
    </script>

@endsection
