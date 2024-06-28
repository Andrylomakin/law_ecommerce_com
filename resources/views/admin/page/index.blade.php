@extends('admin.layouts.layout')

@section('title')
    {{ Str::ucfirst(trans('messages.general.defenders')) }}
@endsection

@section('content')

    @include('admin.layouts.alerts._success')

    <div class="card">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Страницы</h5>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" id="page-add">
                        Добавить страницу
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            @if ($pages->isNotEmpty())
                <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>Название</th>
                        <th>url</th>
                        <th class="text-end">#</th>
                    </tr>
                    </thead>
                    <tbody class="list" style="vertical-align: middle">
                    @foreach($pages as $page)
                        <tr id="page-{{ $page->id }}">
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->slug }}</td>
                            <td class="text-end">
                                <div class="d-flex gap-4 justify-content-end">
                                    <button onclick="removePage({{$page->id}})" class="btn btn-link p-0 ms-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Удалить"
                                            data-bs-original-title="Удалить">
                                        <span class="text-500 fas fa-trash-alt"></span>
                                    </button>
                                    <a href="{{ route('admin.page.edit', $page->id) }}" class="btn btn-link p-0"
                                       type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                       aria-label="Редактировать" data-bs-original-title="Редактировать">
                                        <span class="text-500 fas fa-edit"></span>
                                    </a>
                                </div>
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
        $('#page-add').on('click', function () {
            let page_name = prompt("Укажите название новой страницы");
            if (page_name != null || page_name != "") {
                $.ajax({
                    url: '{{ route('admin.page.create') }}',
                    type: 'POST',
                    data: {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        page_name: page_name,
                    },
                    async: false,
                    success: function (json) {
                        if (json['error']) {
                            alert(json['error']['page_name']);
                        }
                        if (json['success']) {
                            location.href = json['success'];
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        });

        function removePage(page_id) {
            if (confirm("Удалить страницу ?") == true) {
                $.ajax({
                    url: '{{ route('admin.page.destroy') }}',
                    type: 'POST',
                    data: {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        page_id: page_id,
                    },
                    async: false,
                    success: function (json) {
                        if (json['error']) {
                            alert(json['error']);
                        }
                        if (json['success']) {
                            $('#page-'+page_id).remove()
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        }
    </script>
@endsection
