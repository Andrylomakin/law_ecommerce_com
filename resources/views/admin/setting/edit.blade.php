@extends('admin.layouts.layout')



@section('content')
@include('admin.layouts.alerts._success')
@include('admin.layouts.alerts._errors')
<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-6">
                <h5>
                    {{ isset($setting) ? 'Редактирование настройки для - '.$setting['domain'] : 'Создание настройки' }}
                </h5>
            </div>
            <div class="col-6 justify-content-end align-items-end d-flex">
                <a href="{{ route('admin.setting.index') }}" class="btn btn-outline-primary">
                    Назад
                </a>
            </div>
        </div>
    </div>
  <form method="POST" action="{{ isset($setting) ? route('admin.setting.update', $setting['id']) : route('admin.setting.store') }}" enctype="multipart/form-data" class="tabs-admin">
    @csrf
      @if(isset($setting))
          @method('PUT')
      @endif
    <div class="card-header">
      <div class="row">
          @foreach($fields as $field)
              <div class="col-md-12 mb-3">
                  <label class="form-label" for="field_{{ $field }}">
                      {{ $field }} <span style="color: red;">*</span>
                  </label>
                  <input class="form-control" id="{{ $field }}"
                         value="{{ isset($setting[$field]) ? $setting[$field] : '' }}"
                         name="{{ $field }}"
                         type="text">
              </div>
          @endforeach
          @foreach($radioFields as $field_key => $field)
                  <div class="col-12 mb-3">
                      <label class="form-label" for="field_{{ $field_key }}">
                          {{ $field['title'] }}
                          @if(isset($field['validation']) AND in_array('required', $field['validation']))
                              <span style="color: red;">*</span>
                          @endif
                      </label>
                      <br/>
                      <div class="btn-group">
                          @foreach($field['values'] as $value_key => $value)
                              <input type="radio"
                                     class="btn-check"
                                     name="{{ $field_key }}"
                                     value="{{ $value_key }}"
                                     @if(isset($setting[$field_key]))
                                         {{ $setting[$field_key] == $value_key ? 'checked' : '' }}
                                     @endif
                                     id="{{ $field_key.'_'.$value_key }}"
                                     autocomplete="off">
                              <label class="btn btn-outline-primary"
                                     for="{{ $field_key.'_'.$value_key }}">
                                  {{ $value }}
                              </label>
                          @endforeach
                      </div>
                  </div>
          @endforeach
          @foreach($checkboxFields as $field_key => $field)
                  <div class="col-12 mb-3">
                      <label class="form-label" for="field_{{ $field_key }}">
                          {{ $field['title'] }}
                          @if(isset($field['validation']) AND in_array('required', $field['validation']))
                              <span style="color: red;">*</span>
                          @endif
                      </label>
                      <br/>
                      <div class="btn-group">
                          @foreach($field['values'] as $value_key => $value)
                              <input type="checkbox"
                                     class="btn-check"
                                     name="{{ $field_key.'['.$value_key.']' }}"
                                     value="{{ $value_key }}"
                                     @if(isset($setting[$field_key][$value_key]))
                                         {{ $setting[$field_key][$value_key] == $value_key ? 'checked' : '' }}
                                     @endif
                                     id="{{ $field_key.'_'.$value_key }}"
                                     autocomplete="off">
                              <label class="btn btn-outline-primary"
                                     for="{{ $field_key.'_'.$value_key }}">
                                  {{ $value }}
                              </label>
                          @endforeach
                      </div>
                  </div>
          @endforeach

      </div>
      <div class="row mt-4">
        <div class="navigation-buttons justify-content-end">
          <button class="btn btn-success me-1 mb-1">
            Сохранить
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
