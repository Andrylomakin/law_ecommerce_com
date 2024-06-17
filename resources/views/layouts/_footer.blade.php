<footer class="footer">
  <div class="footer__container">
    <div class="footer__content content">
      <div class="content__wrapper baron">
        @yield('seo')
        <div class="baron__track">
          <div class="baron__bar"></div>
        </div>
      </div>
    </div>
    <div class="footer__main">
      <div class="footer__top">
        <a href="{{ route('index') }}" class="footer__logo">
          <div class="footer__image">
            <img src="{{ asset('img/main/logo_footer.svg') }}" alt="">
          </div>
          <div class="footer__logo--text">{{ $settings->logo }}</div>
        </a>
        <div class="footer__info">
          <p>{{__('Приумножьте свой капитал в пять раз начав уже сегодня')}}</p>
        </div>
        <a href="" data-popup="#popup-form" data-so="@yield('so')" class="footer__link--btn-gr _icon-arrow-link">{{ __('Бесплатная консультация') }}</a>
      </div>
      <nav class="footer__nav">
        <ul class="footer__list">
            <li class="footer__item">
                <a href="{{ route('contact') }}" class="footer__link">{{ __('Контакты') }}</a>
            </li>
          @foreach($categoryMenu as $menu)
          <li class="footer__item">
            <a href="{{ route('service.category', $menu->slug) }}" class="footer__link">{{ $menu->name[app()->getLocale()] }}</a>
          </li>
          @endforeach
        </ul>
      </nav>
      <div class="footer__bottom">
        <div class="footer__allright">
          <p>© 2024 insightCo. All rights reserved.</p>
        </div>
        <div class="footer__socials">
          <a href="" data-popup="#popup-form" class="footer__socials--link _icon-facebook"></a>
          <a href="" data-popup="#popup-form" class="footer__socials--link _icon-instagram"></a>
          <a href="" data-popup="#popup-form" class="footer__socials--link _icon-linkedin"></a>
          <a href="" data-popup="#popup-form" class="footer__socials--link _icon-twitter"></a>
          <a href="" data-popup="#popup-form" class="footer__socials--link _icon-youtube"></a>
        </div>
      </div>
    </div>
  </div>
</footer>
