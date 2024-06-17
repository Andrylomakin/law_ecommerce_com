@extends('admin.layouts.layout')



@section('content')
    @include('admin.layouts.alerts._success')
    @include('admin.layouts.alerts._errors')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Перевод шаблона</h5>
                </div>
            </div>
        </div>
        <div class="tabs-admin">
            <div class="card-body bg-light">
                @foreach($localizations as $key => $localization)
                    <div class="col-md-12">
                        <label class="form-label" for="input_{{ config('settings.mainLanguageAdmin') }}">
                            {{ $key }}
                        </label>
                        <div class="input-group mb-3">
                            <input class="form-control"
                                   id="input_{{ config('settings.mainLanguageAdmin') }}"
                                   value="{{ $localization }}"
                                   name="{{ $key }}"
                                   type="text">
                            <button class="btn btn-outline-secondary"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    data-bs-title="Сохраняем и переводим"
                                    onclick="updateLocalization(this, '{{ $key }}');"
                                    type="button">
                                <span class="fas fa-save"></span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function updateLocalization($this, input_name) {
            $($this).html('<span class="fas fa-spin"></span>');
            $($this).attr('disabled', true);
            setTimeout(function () {
                $.ajax({
                    url: '{{ route('admin.template.localization.edit') }}',
                    type: 'POST',
                    data: {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        key : input_name,
                        text: $('input[name="'+input_name+'"]').val()
                    },
                    async: false,
                    success: function (json) {
                        if(json['success']){
                            $('input[name="'+input_name+'"]').addClass('is-valid');
                            setTimeout(function () {
                                $($this).html('<span class="fas fa-save"></span>');
                                $('input[name="'+input_name+'"]').removeClass('is-valid');
                                $($this).attr('disabled', false);
                            }, 1500);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }, 100);
        }
    </script>
@endsection
