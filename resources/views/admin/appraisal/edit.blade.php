@extends('admin.layouts.layout')



@section('content')
    @include('admin.layouts.alerts._success')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Создание карточки</h5>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.appraisal.change', $appraisal->id) }}" method="post" enctype="multipart/form-data" data-tabs class="tabs-admin">
            @csrf

            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Имя*
                        </label>
                        <input class="form-control" id="title" value="{{ $appraisal->name }}" name="name"
                               type="text">
                    </div>

{{--                    <div class="col-md-12">--}}
{{--                        <label class="form-label" for="title_ru">--}}
{{--                            Превью отзвыва*--}}
{{--                        </label>--}}
{{--                        <input class="form-control" id="title" value="{{ $appraisal->preview }}" name="preview"--}}
{{--                               type="text">--}}
{{--                    </div>--}}

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Отзыв*
                        </label>
                        <input class="form-control" id="title" value="{{ $appraisal->description }}" name="description"
                               type="text">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Оценка*
                        </label>
                        <input class="form-control" id="title" value="{{ $appraisal->rating }}" name="rating"
                               type="text">
                    </div>


                    <div class="col-md-12">
                        <label class="form-label" for="title_ru">
                            Фото*
                        </label>
                        <input class="form-control" id="title" name="photo"
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
@endsection
