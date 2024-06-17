<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tabs.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    @yield('style')
    <style>
        #fm{
            height: 100% !important;
        }
    </style>
</head>


<body>

<main class="main" id="top">
    <div class="container" data-layout="container">
        @include('admin.layouts.partials._menu')

        <div class="content">
            @include('admin.layouts.partials._nav')

            @yield('content')
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="{{ asset('assets/admin/js/config.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme.js') }}"></script>
<script src="{{ asset('assets/admin/js/tabs.js') }}"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@yield('scripts')

<script>
    function translationFromTheMainLanguage($this, language_code, language_translate) {
        if(!$($this).siblings('*[name]')){
            alert('Соседнее поле не найдено');
            return;
        }

        let mainLanguageAdmin = "{{ config('settings.mainLanguageAdmin') }}";
        let outInput = $($this).siblings('*[name]');
        let mainInput = $('*[name="'+ outInput.attr('name').replace('['+language_code+']', '['+mainLanguageAdmin+']') +'"]');

        if(!mainInput.length){
            alert('Нет поля откуда берем текст');
            return;
        }

        if(!mainInput.val().length){
            alert('Поле пустое');
            return;
        }

        $.ajax({
            url: '{{ route('admin.translate.from_the_main_language') }}',
            type: 'POST',
            data: {
                _token: $("meta[name='csrf-token']").attr("content"),
                text: mainInput.val(),
                language: language_translate
            },
            async: false,
            success: function (json) {
                if(json['success']){
                    outInput.val(json['success']);
                    if(outInput.prop('tagName') == 'TEXTAREA' && CKEDITOR.instances[outInput.attr('id')]){
                        CKEDITOR.instances[outInput.attr('id')].setData(json['success']);
                    }
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    }
</script>
</body>

</html>
