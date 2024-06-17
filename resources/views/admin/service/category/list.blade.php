
@extends('admin.layouts.layout')

@section('title')
    {{ Str::ucfirst(trans('messages.general.defenders')) }}
@endsection

@section('content')

    @include('admin.layouts.alerts._success')

    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">
                        Категории
                    </h5>
                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Список</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            @if ($categories->isNotEmpty())

                <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th class="sort" data-sort="id">{{ __('ID') }}</th>
                        <th class="sort" data-sort="title">Название</th>
                        <th class="sort">Сортировка</th>
                        <th>#</th>

                    </tr>
                    </thead>
                    <tbody class="list" style="vertical-align: middle">
                    @foreach($categories as $category)
                        <tr>
                            <td class="id">{{ $category->id }}</td>
                            <td class="title">{{ $category->name[app()->getLocale()] }}</td>
                            <td><input class="form-control" value="{{ $category->sort_order }}" name="sort_order[{{ $category->id }}]" type="number"></td>
                            <td>

                                <a href="{{ route('admin.service.category.edit',$category->id) }}" class="btn p-0 info-btn"
                                   style="margin-right: 5px"
                                   type="submit">

                                    <span class="far fa-edit"></span>
                                </a>

                                <a href="{{ route('admin.service.category.copy', $category->id) }}" class="btn p-0 danger-btn"
                                   style="margin-right: 5px"
                                   type="submit">

                                    <span class="far fa-copy"></span>
                                </a>

                                <a href="{{ route('admin.service.category.delete', $category->id) }}" onclick="test(event)" class="btn p-0 delete-btn"
                                   type="submit">
                                    <svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true"
                                         focusable="false" data-prefix="far" data-icon="trash-alt" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path>
                                    </svg><!-- <span class="far fa-trash-alt"></span> Font Awesome fontawesome.com -->
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        function test(e) {
            if(confirm('Удалить?')){
                return true;
            }else{
                e.preventDefault();
            }
        };
    </script>
    <script>
        $('input[name^="sort_order["]').on('change', function () {
            var $this = $(this);
            var inputName = $this.attr('name');
            var contentInsideBrackets = inputName.match(/\[(.*?)\]/)[1];

            $.ajax({
                url: '{{ route('admin.service.category.update_sort_order') }}',
                type: 'POST',
                data: {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    id: contentInsideBrackets,
                    sort_order: $(this).val()
                },
                async: false,
                success: function (json) {
                    if(json['success']){
                        $this.addClass('is-valid');
                        setTimeout(function () {
                            $this.removeClass('is-valid');
                        }, 2000);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });
    </script>
@endsection
