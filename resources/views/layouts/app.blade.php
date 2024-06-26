<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  @foreach ($languageUrls as $language => $url)
  <link rel="alternate" hreflang="{{ $language }}" href="{{ url('/') }}/{{ $url }}" />
  @endforeach

  <title>@yield('meta_title',$seo->seo_title[app()->getLocale()] ?? '')</title>
  <meta name="description" content="@yield('meta_description',$seo->seo_description[app()->getLocale()] ?? '')">


  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="{{ asset($settings->stylesheet) }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_tags }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', '{{ $settings->google_tags }}');
  </script>




  <script>
    @yield('codeTags')
  </script>

  <!-- Meta Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{ $settings->fb_pixel }}');
    fbq('track', 'PageView');

    @yield('codePixel')
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ $settings->fb_pixel }}&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->

  <meta name="facebook-domain-verification" content="{{ $settings->verification_domain }}" />
</head>

<body class="load">
  <div class="wrapper">
    @include('layouts._header')

    @yield('content')

    @include('layouts._footer')

    @include('layouts._popup')
    <script src='{{ asset('https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js?_v=20240307195727') }}'></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.5/build/js/intlTelInput.min.js?_v=20240307195727') }}"></script>
    <script src='{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js?_v=20240307195727') }}'></script>
      <script>
          var intl_tel_input_mask = [{!! $settings->tel_mask !!}];
          var initialCountry = '{{ config('settings.mask')[app()->getLocale()] }}';

          @if($settings->google_tags_conversion_viber)
          var viberButtons = document.querySelectorAll('._viber');
          if (viberButtons) {
              viberButtons.forEach(function(button) {
                  button.addEventListener('click', function(e) {
                      gtag('event', 'conversion', {'send_to': '{{ $settings->google_tags_conversion_viber }}', 'transaction_id': ''});
                  });
              });
          }
          @endif
          @if($settings->google_tags_conversion_whatsapp)
          var whatsappButtons = document.querySelectorAll('._whatsapp');
          if (whatsappButtons) {
              whatsappButtons.forEach(function(button) {
                  button.addEventListener('click', function(e) {
                      gtag('event', 'conversion', {'send_to': '{{ $settings->google_tags_conversion_whatsapp }}', 'transaction_id': ''});
                  });
              });
          }
          @endif
          @if($settings->google_tags_conversion_telegram)
          var telegramButtons = document.querySelectorAll('._telegram');
          if (telegramButtons) {
              telegramButtons.forEach(function(button) {
                  button.addEventListener('click', function(e) {
                      gtag('event', 'conversion', {'send_to': '{{ $settings->google_tags_conversion_telegram }}', 'transaction_id': ''});
                  });
              });
          }
          @endif
      </script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/app.min.js?_v=20240321114455') }}"></script>
      <style>
          .contacts-form__inner .form-contacts__input:valid{
              border-bottom-color: var(--primary);
          }
          .contacts-form__inner .form-contacts__input:hover{
              border-bottom-color: rgba(0,0,0,.33);
          }
          .contacts-form__inner .form-contacts__input:focus{
              border-bottom-color: var(--accent);
          }

          .form-contacts__item .form-contacts__input:valid{
              border-bottom-color: var(--primary);
          }
          .form-contacts__item .form-contacts__input:hover{
              border-bottom-color: rgba(0,0,0,.33);
          }
          .form-contacts__item .form-contacts__input:focus{
              border-bottom-color: var(--accent);
          }

          .contacts__wrapper .form-contacts__item .form-contacts__input:valid{
              border-bottom-color: var(--wh);
          }
          .contacts__wrapper .form-contacts__item .form-contacts__input:hover{
              border-bottom-color: rgba(245,245,245,.33);
          }
          .contacts__wrapper .form-contacts__item .form-contacts__input:focus{
              border-bottom-color: var(--accent);
          }
      </style>
  </div>
</body>

</html>
