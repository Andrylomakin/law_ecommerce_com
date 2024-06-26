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
    <script src='{{ asset('https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js?_v=20240307195727') }}'></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.5/build/js/intlTelInput.min.js?_v=20240307195727') }}"></script>
    <script src='{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js?_v=20240307195727') }}'></script>
      <script>
          var intl_tel_input_mask = [{!! $settings->tel_mask !!}];
          var initialCountry = '{{ $phone_mask }}';

          @if(isset($settings->google_tags_conversion_social) AND $settings->google_tags_conversion_social)
          var socialButtons = document.querySelectorAll('._viber, ._whatsapp, ._telegram');
          if (socialButtons) {
              socialButtons.forEach(function(button) {
                  button.addEventListener('click', function(e) {
                      gtag('event', 'conversion', {'send_to': '{{ $settings->google_tags_conversion_social }}', 'transaction_id': ''});
                  });
              });
          }
          @endif
          @if(isset($settings->fb_conversion_social) AND $settings->fb_conversion_social AND $not_send_target_fb == false)
          var socialButtons2 = document.querySelectorAll('._viber, ._whatsapp, ._telegram');
          var fbqCount = 0;
          if (socialButtons2) {
              socialButtons2.forEach(function(button) {
                  button.addEventListener('click', function(e) {
                      if(fbqCount == 0){
                          fbq('track', '{{ $settings->fb_conversion_social }}');
                          fbqCount++;
                      }
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

      @include('layouts._popup')
      <script>
          document.addEventListener("afterPopupOpen", function (e) {
              const currentPopup = e.detail.popup;
              if(document.querySelector(currentPopup.hash).classList.contains('popup_show') == false){
                  document.querySelector(currentPopup.hash).classList.add('popup_show')
              }
          });
          document.addEventListener("afterPopupClose", function (e) {
              const currentPopup = e.detail.popup;
              document.querySelector(currentPopup.hash).classList.remove('popup_show');
          });
      </script>
  </div>
</body>

</html>
