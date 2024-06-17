@extends('layouts.app')

@section('meta_title', $card->seo_title[app()->getLocale()] ?? '')
@section('meta_description', $card->seo_description[app()->getLocale()] ?? '')
@section('so', $card->so ?? 'Invest')
{{--@section('name', $card->name[app()->getLocale()])--}}
{{--@section('description', $card->description[app()->getLocale()])--}}
@section('content')
{!! $schema->toScript() !!}
<main>
  <section class="page-service">
    <div class="page-service__container">
      <div class="page-service__wrapper">
        <div class="page-service__subtitle subtitle">{{ __('Заработайте от') }} {{ $card->price }}</div>
        <h1 class="page-service__title">{{ $card->name[app()->getLocale()] }}</h1>
        <div class="page-service__row">
          <div class="page-service__text">{!! $card->preview_name[app()->getLocale()] !!}</div>
          <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="page-service__link--btn _icon-arrow-link">{{ __('Заказать услугу') }}</a>
        </div>
      </div>
      <div class="page-service__bg">
        <div class="page-service__bg--pc">
          <picture>
            <source srcset="/storage/app/public/service/{{ $card->photo }}" type="image/webp"><img src="/storage/app/public/service/{{ $card->photo }}" alt="">
          </picture>
        </div>
        <div class="page-service__bg--mob">
          <picture>
            <source srcset="/storage/app/public/service/{{ $card->photo_mobile }}" type="image/webp"><img src="/storage/app/public/service/{{ $card->photo_mobile }}" alt="">
          </picture>
        </div>
      </div>
    </div>
  </section>
  <section class="service-content">
    <div class="service-content__container">
      <div class="service-content__wrapper">
        {{-- <div class="service-content__subtitle subtitle"></div>--}}
        <div class="service-content__wrap">{!! $card->description[app()->getLocale()] !!}</div>
        <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="service-content__link--btn-gr _icon-arrow-link">{{ __('Заказать услугу') }}</a>
      </div>
    </div>
  </section>
  <section class="contacts">
    <div class="contacts__container">
      <div class="contacts__wrapper">
        <div class="contacts__content">
          <div class="contacts__top">
            <div class="contacts__subtitle subtitle">{{ __('Контакты') }}</div>
            <h2 class="contacts__title">{{ __('Свяжитесь с нами, чтобы начать свой путь финансовой независимости') }}</h2>
          </div>
          <div class="contacts__text">
            <p>{{ __('А чтобы вас мотивировать, мы начислим вам 200 долларов на ваш депозит. Не упустите возможность увеличить свой капитал, начните инвестировать сейчас!') }}</p>
          </div>
        </div>
        <form action="{{ route('send.form') }}" method="post" id="form_{{ rand(10000,99999) }}" class="contacts__form form-contacts">
          @csrf
          <div class="form-contacts__inner">
            <div class="form-contacts__item">
              <input placeholder="{{ __('Имя*') }}" class="form-contacts__input" name="firstname" type="text">
            </div>
            <div class="form-contacts__item">
              <input placeholder="{{ __('Фамилия*') }}" class="form-contacts__input" name="lastname" type="text">
            </div>
            <div class="form-contacts__item">
              <input placeholder="Email" class="form-contacts__input" name="email" type="email">
            </div>
            <div class="form-contacts__item">
              <input class="form-contacts__input phone-mask" name="phone" type="tel">
            </div>
              <input type="hidden" name="country_code" value="">
              <input type="hidden" name="so" value="{{ $card->so ? $card->so : 'Invest' }}">
              <input type="hidden" name="url" value="{{ url()->current() }}">
          </div>
          <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">{{ __('Подтвердить') }}</button>
        </form>
      </div>
    </div>
  </section>
  <section class="advantages">
    <div class="advantages__container">
      <div class="advantages__wrapper">
        <div class="advantages__item">
          <h3 class="advantages__title">{{ __('Профессионализм и опыт') }}</h3>
          <div class="advantages__text">
            <p>{{ __('Воспользуйтесь комплексным медицинским страхованием, включающим медицинские, стоматологические и офтальмологические планы.') }}</p>
          </div>
        </div>
        <div class="advantages__item">
          <h3 class="advantages__title">{{ __('Персонализация и подход') }}</h3>
          <div class="advantages__text">
            <p>{{ __('Получите доступ к широкому спектру возможностей обучения, семинаров и программ повышения квалификации, которые позволят вам развиваться в своей роли.') }}</p>
          </div>
        </div>
        <div class="advantages__item">
          <h3 class="advantages__title">{{ __('Конфиденциальность и безопасность') }}</h3>
          <div class="advantages__text">
            <p>{{ __('Мы понимаем важность баланса. Гибкий график работы и возможность удаленной работы позволяют вам эффективно управлять своей личной и профессиональной жизнью.') }}</p>
          </div>
        </div>
        <div class="advantages__item">
          <h3 class="advantages__title">{{ __('Эффективность и результативность') }}</h3>
          <div class="advantages__text">
            <p>{{ __('Работайте над разнообразными проектами в разных отраслях, расширяя свой набор навыков и расширяя горизонты дизайна.') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-us contact-us__service">
    <div class="contact-us__container">
      <div class="contact-us__wrapper">
        <div class="contact-us__image">
          <div class="contact-us__image--pc lazy_image">
            <picture>
              <source data-srcset="{{ asset('img/services/servise_image-02.webp') }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{ asset('img/services/servise_image-02.png') }}" alt="">
            </picture>
          </div>
          <div class="contact-us__image--mob lazy_image">
            <picture>
              <source data-srcset="{{ asset('img/services/servise_image-02-mob.webp') }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{ asset('img/services/servise_image-02-mob.png') }}" alt="">
            </picture>
          </div>
        </div>
        <div class="contact-us__content">
          <div class="contact-us__subtitle subtitle">{{ __('Наше преимущество') }}</div>
          <h2 class="contact-us__title">{{ __('Сопровождение сделок') }}</h2>
          <div class="contact-us__full">
            <p>{{ __('На некоторых платформах доступно автоматизированное сопровождение сделок, которое позволяет инвесторам автоматически проводить определенные торговые операции в соответствии с заданными параметрами.') }}</p>
          </div>
          <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="contact-us__link--btn-gr _icon-arrow-link">{{ __('Заказать услугу') }}</a>
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
  <section class="registration">
    <div class="registration__container">
      <div class="registration__wrapper">
        <div class="registration__content">
          <div class="registration__top">
            <div class="registration__subtitle subtitle">{{ __('Регистрация') }}</div>
            <h2 class="registration__title">{{ __('Добро пожаловать в InsightCo') }}</h2>
          </div>
          <a href="" data-popup="#popup-form_registration" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="registration__link _icon-user">{{ __('Регистрация по телефону/эл. почте') }}</a>
          <div class="registration__row">
            <div class="registration__info">{{ __('Уже есть аккаунт?') }}</div>
            <a href="" data-popup="#popup-form_registration" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="registration__login">{{ __('Войти') }}</a>
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
  <section class="service-more">
    <div class="service-more__container">
      <div class="service-more__top">
        <div class="service-more__subtitle subtitle">{{ __('Услуги') }}</div>
        <h2 class="service-more__title--top">{{ __('Больше услуг') }}</h2>
      </div>
      <div class="service-more__wrapper">
        <div class="service-more__inner">
          <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="service-more__item">
            <div class="service-more__wrap">
              <h4 class="service-more__title">{{ __('Консультационные услуги') }}</h4>
            </div>
            <div class="service-more__block">
              <div class="service-more__icon _icon-arrow-link"></div>
              <div class="service-more__info">{{ __('Заработайте от 200$') }}</div>
            </div>
          </a>
          <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="service-more__item">
            <div class="service-more__wrap">
              <h4 class="service-more__title">{{ __('Обучающие материалы') }}</h4>
            </div>
            <div class="service-more__block">
              <div class="service-more__icon _icon-arrow-link"></div>
              <div class="service-more__info">{{ __('Заработайте от 1000$') }}</div>
            </div>
          </a>
          <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}"  class="service-more__item">
            <div class="service-more__wrap">
              <h4 class="service-more__title">{{ __('Платформы и приложения') }}</h4>
            </div>
            <div class="service-more__block">
              <div class="service-more__icon _icon-arrow-link"></div>
              <div class="service-more__info">{{ __('Заработайте от 4000$') }}</div>
            </div>
          </a>
          <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="service-more__item">
            <div class="service-more__wrap">
              <h4 class="service-more__title">{{ __('Покупка и продажа криптовалют') }}</h4>
            </div>
            <div class="service-more__block">
              <div class="service-more__icon _icon-arrow-link"></div>
              <div class="service-more__info">{{ __('Заработайте от 4000$') }}</div>
            </div>
          </a>
        </div>
        <a href="" data-popup="#popup-form" data-so="{{ $card->so ? $card->so : 'Invest' }}" class="service-more__link--btn _icon-arrow-link">{{ __('Бесплатная консультация') }}</a>
      </div>
  </section>
  <section class="contacts">
    <div class="contacts__container">
      <div class="contacts__wrapper contacts__wrapper-1">
        <div class="contacts__inner inner-contacts">
          <div class="inner-contacts__image lazy_image">
            <img data-src="{{ asset('img/main/line_chart-01.svg') }}" alt="">
          </div>
        </div>
        <form action="{{ route('send.form') }}" method="post" id="form_{{ rand(10000,99999) }}" class="contacts__form form-contacts">
            @csrf
          <div class="form-contacts__inner">
            <div class="form-contacts__item">
              <input placeholder="{{ __('Имя*') }}" class="form-contacts__input" name="firstname" type="text">
            </div>
            <div class="form-contacts__item">
              <input placeholder="{{ __('Фамилия*') }}" class="form-contacts__input" name="lastname" type="text">
            </div>
            <div class="form-contacts__item">
              <input placeholder="Email" class="form-contacts__input" name="email" type="email">
            </div>
            <div class="form-contacts__item">
              <input class="form-contacts__input phone-mask" name="phone" type="tel">
            </div>
          </div>
          <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">{{ __('Подтвердить') }}</button>

            <input type="hidden" name="so" value="{{ $card->so ? $card->so : 'Invest' }}">
            <input type="hidden" name="url" value="{{ url()->current() }}">
        </form>
      </div>
    </div>
  </section>
  @section('seo')
  <div class="content__body baron__scroller">
    {!! $card->seo_text[app()->getLocale()] !!}
  </div>
  @endsection
</main>
@endsection
