@extends('admin.layouts.layout')



@section('content')
    @include('admin.layouts.alerts._success')
    @include('admin.layouts.alerts._errors')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="mb-0">Настройки</h5>
                </div>
                <div class="col-6 justify-content-end align-items-end d-flex">
                    <a href="{{ route('admin.setting.create') }}" class="btn btn-primary">
                        Добавить настройку
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($settings)
                <div class="table-responsive scrollbar">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Домен</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата редактирования</th>
                            <th class="text-end" scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($settings as $setting)
                            <tr>
                                <td>{{ $setting->id }}</td>
                                <td>{{ $setting->domain }}</td>
                                <td>{{ $setting->created_at }}</td>
                                <td>{{ $setting->updated_at }}</td>
                                <td class="text-end">
                                    <div class="d-flex gap-4 justify-content-end">
                                        <a href="{{ route('admin.setting.destroy', $setting->id) }}" class="btn btn-link p-0 ms-2"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Удалить">
                                            <span class="text-500 fas fa-trash-alt"></span>
                                        </a>
                                        <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-link p-0" type="button" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Редактировать">
                                            <span class="text-500 fas fa-edit"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
