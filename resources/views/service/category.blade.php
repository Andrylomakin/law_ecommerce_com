@extends('layouts.app')
@section('meta_title', $category->seo_title[app()->getLocale()] ?? '')
@section('meta_description', $category->seo_description[app()->getLocale()] ?? '')
@section('content')
<main class="main-dark">
  <section class="page-services">
    <div class="page-services__container">
      <div class="page-services__top">
        <div class="page-services__subtitle subtitle">{{ __('Услуги') }}</div>
        <h1 class="page-services__title">{{ $category->name[app()->getLocale()] }}</h1>
      </div>
      <div class="page-services__tabs tabs">
        <nav data-tabs-titles class="tabs__navigation">
          @foreach($tabs as $tab)
          <a href="{{ route('service.category', ['slug' => $tab['slug']]) }}" type="button" class="tabs__title @if($tab->slug == $category->slug) _tab-active @endif">{{ $tab->name[app()->getLocale()] }}</a>
          @endforeach
        </nav>
        <div data-tabs-body class="tabs__content">
          <div class="tabs__services services-tabs">
            <div class="services-tabs__wrapper">
              @foreach($cards as $card)
              @if($card->category_id == $category->id)
              <a href="{{ route('service.show', $card->slug) }}" class="services-tabs__item">
                <div class="services-tabs__row">
                  <div class="services-tabs__icon lazy_image">
                    <img data-src="/storage/app/public/service/{{$card->icon}}" alt="">
                  </div>
                  <div class="services-tabs__rating rating">
                    <div class="rating__row">
                      <div class="rating__wrap">
                        <div class="rating__full lazy_image" style="width: {{ $card->rating }}%;">
                          <img data-src="{{ asset('img/icons/rating.svg') }}" alt="">
                        </div>
                        <div class="rating__epmty lazy_image">
                          <img data-src="{{ asset('img/icons/rating-empty.svg') }}" alt="">
                        </div>
                      </div>
                      <div class="rating__value">{{ $card->rating() }}</div>
                    </div>
                    <div class="rating__total">{{ __("На основании ") }}<span>{{ $card->review }}+</span>{{ __(" отзывов") }}</div>
                  </div>
                </div>
                <div class="services-tabs__wrap">
                  <div class="services-tabs__top">
                    <div class="services-tabs__subtitle">{{ __('Заработайте от') }}
                      <span>{{ $card->price }}</span>
                    </div>
                    <h3 class="services-tabs__title">{{ $card->name[app()->getLocale()] }}</h3>
                    <div class="services-tabs__text">{!! $card->preview_name[app()->getLocale()] !!}</div>
                  </div>
                  <div class="services-tabs__bottom">
                    <div class="services-tabs__more">{{ __('Узнать больше') }}</div>
                    <button type="button" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="services-tabs__link--btn _icon-arrow-link">{{ __('Заказать услугу') }}</button>
                  </div>
                </div>
              </a>
              @elseif($category->id == 11)
              <a href="{{ route('service.show', $card->slug) }}" class="services-tabs__item">
                <div class="services-tabs__row">
                  <div class="services-tabs__icon lazy_image">
                    <img data-src="/storage/app/public/service/{{$card->icon}}" alt="">
                  </div>
                  <div class="services-tabs__rating rating">
                    <div class="rating__row">
                      <div class="rating__wrap">
                        <div class="rating__full lazy_image" style="width: {{ $card->rating }}%;">
                          <img data-src="{{ asset('img/icons/rating.svg') }}" alt="">
                        </div>
                        <div class="rating__epmty lazy_image">
                          <img data-src="{{ asset('img/icons/rating-empty.svg') }}" alt="">
                        </div>
                      </div>
                      <div class="rating__value">{{ $card->rating() }}</div>
                    </div>
                    <div class="rating__total">{{ __("На основании ") }}<span>{{ $card->review }}+</span>{{ __(" отзывов") }}</div>
                  </div>
                </div>
                <div class="services-tabs__wrap">
                  <div class="services-tabs__top">
                    <div class="services-tabs__subtitle">{{ __('Заработайте от') }}
                      <span>{{ $card->price }}</span>
                    </div>
                    <h3 class="services-tabs__title">{{ $card->name[app()->getLocale()] }}</h3>
                    <div class="services-tabs__text">{!! $card->preview_name[app()->getLocale()] !!}</div>
                  </div>
                  <div class="services-tabs__bottom">
                    <div class="services-tabs__more">{{ __('Узнать больше') }}</div>
                    <button type="button" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="services-tabs__link--btn _icon-arrow-link">{{ __('Заказать услугу') }}</button>
                  </div>
                </div>
              </a>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    @include('blocks.contacts-form')
  <section class="registration">
    <div class="registration__container">
      <div class="registration__wrapper">
        <div class="registration__content">
          <div class="registration__top">
            <div class="registration__subtitle subtitle">{{ __('Регистрация') }}</div>
            <h2 class="registration__title">{{ __('Добро пожаловать в InsightCo') }}</h2>
          </div>
          <a href="" data-popup="#popup-form_registration" class="registration__link _icon-user">{{ __('Регистрация по телефону/эл. почте') }}</a>
          <div class="registration__row">
            <div class="registration__info">{{ __('Уже есть аккаунт?') }}</div>
            <a href="" data-popup="#popup-form_registration" class="registration__login">{{ __('Войти') }}</a>
          </div>
        </div>
        <div class="registration__discount discount-registration">
          <div data-da=".registration__content,991.98,1" class="discount-registration__wrap">
            <div class="discount-registration__title">{{ __('Получите скидку 100 USDT за регистрацию!') }}</div>
            <div class="discount-registration__text">
              <p>{{ __('Пройдите регистрацию, получите вознаграждения и начните путешествие вместе с нами!') }}</p>
            </div>
          </div>
          <div class="discount-registration__image lazy_image">
            <img data-src="{{ asset('img/main/line_chart.svg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="reviews reviews-ser">
    <div class="reviews__container">
      <div class="reviews__body">
        <div class="reviews__top">
          <div class="reviews__subtitle subtitle">{{ __('Отзывы') }}</div>
          <h2 class="reviews__title">{{ __('О нас говорят наши клиенты') }}</h2>
        </div>
        <div class="reviews__slider swiper">
          <div class="reviews__wrapper swiper-wrapper">
            @foreach($appraisal as $review)
            <div class="reviews__slide swiper-slide">
              <div class="reviews__main">
                <div class="reviews__avatar lazy_image">
                  <picture>
                    <source data-srcset="/storage/app/public/service/{{ $review->photo }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="/storage/app/public/service/{{ $review->photo }}" alt="">
                  </picture>
                </div>
                <div class="reviews__block">
                  <h3 class="reviews__name">{{ $review->name }}</h3>
                  <div class="reviews__info">
                    <p>{{ $review->preivew }}</p>
                  </div>
                </div>
              </div>
              <div class="reviews__inner">
                <div class="reviews__rating">
                  <span class="reviews__star _icon-star"></span>
                  <span class="reviews__star _icon-star"></span>
                  <span class="reviews__star _icon-star"></span>
                  <span class="reviews__star _icon-star"></span>
                  <span class="reviews__star _icon-star"></span>
                </div>
                <div class="reviews__text">
                  {{ $review->description }}
                </div>
              </div>
              <!-- <div class="reviews__logo">
                <picture>
                  <source srcset="{{ asset('img/reviews/reviews_logo-01.webp') }}" type="image/webp">
                  <img src="{{ asset('img/reviews/reviews_logo-01.png') }}" alt="">
                </picture>
              </div> -->
            </div>
            @endforeach
          </div>
          <div class="reviews__row">
            <div data-da=".reviews__nav,767.98,1" class="reviews__fraction">
              <span class="reviews__fraction--current">1</span>/<span class="reviews__fraction--all"></span>
            </div>
            <div class="reviews__nav">
              <button type="button" class="reviews__swiper-button reviews__swiper-button-prev _icon-arrow-link"></button>
              <button type="button" class="reviews__swiper-button reviews__swiper-button-next _icon-arrow-link"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@section('seo')
    <div class="content__body baron__scroller">
        {!! $category->seo_text[app()->getLocale()] !!}
    </div>
@endsection
