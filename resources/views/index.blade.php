@extends('layouts.app')
@section('content')
<main>
  <section class="main">
    <div class="main__container">
      <div class="main__wrapper">
        <div class="main__top">
          <div class="main__content">
            <div class="main__subtitle subtitle">{{ __('Платформа для инвестирования') }}</div>
            <h1 class="main__title--top">{{ __('Приумножьте свой капитал в пять раз начав уже сегодня') }}</h1>
            <a href="" data-popup="#popup-form" class="main__link--btn _icon-arrow-link">{{ __('Бесплатная консультация') }}</a>
          </div>
        </div>
        <div class="main__body">
          <div class="main__nav">
            <button type="button" class="main__swiper-button swiper-button-next _icon-arrow-btn"></button>
            <button type="button" class="main__swiper-button swiper-button-prev _icon-arrow-btn"></button>
          </div>
          <div class="main__slider swiper">
            <div class="main__wrapper swiper-wrapper">
              <div class="main__slide swiper-slide">
                <div class="main__inner">
                  <div class="main__info">
                    <div class="main__count">1</div>
                    <h4 class="main__title">{{ __('Инвестируйте в акции, гарантировано 27% годовых') }}</h4>
                    <div class="main__text">
                      <p>{{ __('Подарите инвестициям новые возможности') }}</p>
                    </div>
                  </div>
                  <div class="main__image--wrap">
                    <div class="main__image lazy_image">
                      <picture>
                        <source data-srcset="{{ asset('img/main/main_slider-01.webp') }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{ asset('img/main/main_slider-01.jpg') }}" alt="">
                      </picture>
                    </div>
                    <a href="" data-popup="#popup-form" class="main__link _icon-arrow-link"></a>
                  </div>
                </div>
              </div>
              <div class="main__slide swiper-slide">
                <div class="main__inner">
                  <div class="main__info">
                    <div class="main__count">2</div>
                    <h4 class="main__title">{{ __('Инвестируйте в акции, гарантировано 25% годовых2') }}</h4>
                    <div class="main__text">
                      <p>{{ __('Подарите инвестициям новые возможности2') }}</p>
                    </div>
                  </div>
                  <div class="main__image--wrap">
                    <div class="main__image lazy_image">
                      <picture>
                        <source data-srcset="{{ asset('img/main/main_slider-01.webp') }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{ asset('img/main/main_slider-01.jpg') }}" alt="">
                      </picture>
                    </div>
                    <a href="" data-popup="#popup-form" class="main__link _icon-arrow-link"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main__bg">
        <div class="main__bg--pc">
          <picture>
            <source srcset="{{ asset('img/main/main_img.webp') }}" type="image/webp"><img src="{{ asset('img/main/main_img.jpg') }}" alt="">
          </picture>
        </div>
        <div class="main__bg--mob">
          <picture>
            <source srcset="{{ asset('img/main/main_img-mob.webp') }}" type="image/webp"><img src="{{ asset('img/main/main_img-mob.jpg') }}" alt="">
          </picture>
        </div>
      </div>
    </div>
  </section>
  <section class="partners">
    <div class="partners__container">
      <div class="partners__title">{{ __('Наши партнеры') }}</div>
      <div class="partners__wrapper">
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-01.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-02.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-03.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-04.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-05.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-06.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-07.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-01.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-02.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-03.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-04.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-05.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-06.svg') }}" alt="">
          </div>
        </div>
        <div class="partners__item">
          <div class="partners__image lazy_image">
            <img data-src="{{ asset('img/partners/partners_image-07.svg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about">
    <div class="about__container">
      <div class="about__body">
        <div class="about__top">
          <div class="about__subtitle subtitle">{{ __('Про нас') }}</div>
          <h2 class="about__title">{{ __('Инвестировать') }} <span>{{ __('с нами легко') }}</span></h2>
          <div data-da=".about__info,767.98,0" class="about__image">
            <img src="{{ asset('img/main/charts.svg') }}" alt="">
          </div>
        </div>
        <div class="about__wrapper">
          <div id="watcher-counter" class="about__info">
            <div class="about__item">
              <div data-digits-counter data-digits-counter-speed="2500" class="about__count">10</div>
              <p class="about__text">{{ __('Лет опыта на рынке инвестиций') }}</p>
            </div>
            <div class="about__item">
              <div data-digits-counter data-digits-counter-speed="2500" class="about__count">500</div>
              <p class="about__text">{{ __('Довольных клиентов') }}</p>
            </div>
          </div>
          <div class="about__content">
            <div class="about__content--text">
              <p>{{ __('Присоединившись к нам, вы получите персонального менеджера, который проконсультирует вас и поможет создать ваш личный кабинет.') }}</p>
              <p>{{ __('Наша команда экспертов в сфере финансов всегда рядом, чтобы помочь вам принимать осознанные решения.') }}</p>
            </div>
            <a href="" data-popup="#popup-form" data-da=".about__wrapper,767.98,0" class="about__link--btn-gr _icon-arrow-link">{{ __('Бесплатная консультация') }}</a>
          </div>
        </div>
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
                  <input placeholder="{{ __('Имя*') }}" class="form-contacts__input" name="lastname" type="text">
              </div>
              <div class="form-contacts__item">
                  <input placeholder="{{ __('Фамилия*') }}" class="form-contacts__input" name="firstname" type="text">
              </div>
              <div class="form-contacts__item">
                  <input placeholder="Email" class="form-contacts__input" name="email" type="email">
              </div>
              <div class="form-contacts__item">
                  <input class="form-contacts__input phone-mask" name="phone" type="tel">
              </div>
              <input type="hidden" name="country_code" value="">
              <input type="hidden" name="so" value="Invest">
              <input type="hidden" name="url" value="{{ url()->current() }}">
          </div>
          <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">{{ __('Подтвердить') }}</button>
        </form>

      </div>
    </div>
  </section>
  <section class="contact-us">
    <div class="contact-us__container">
      <div class="contact-us__wrapper">
        <div class="contact-us__image lazy_image">
          <picture>
            <source data-srcset="{{ asset('img/main/main_contacts.webp') }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{ asset('img/main/main_contacts.png') }}" alt="">
          </picture>
        </div>
        <div class="contact-us__content">
          <div class="contact-us__subtitle subtitle">{{ __('Свяжитесь с нами') }}</div>
          <h2 class="contact-us__title">{{ __('Присоединившись к нам, вы получите персонального менеджера, который проконсультирует вас и поможет создать ваш личный кабинет.') }}</h2>
          <div class="contact-us__block">
            <div class="contact-us__text">
              <p>{{ __('А чтобы вас мотивировать, мы начислим вам 200 долларов на ваш депозит. Не упустите возможность увеличить свой капитал, начните инвестировать сейчас!') }}</p>
            </div>
            <a href="" data-popup="#popup-form" class="contact-us__link--btn _icon-arrow-link">{{ __('Связаться с нами') }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="registration">
    <div class="registration__container">
      <div class="registration__wrapper">
        <div class="registration__content registration__content--main">
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
          <div data-da=".registration__content--main,991.98,1" class="discount-registration__wrap">
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
  <section class="services">
    <div class="services__container">
      <div class="services__top">
        <div class="services__block">
          <div class="services__subtitle subtitle">{{ __('Услуги') }}</div>
          <h2 class="services__title">{{ __('Наши услуги') }}</h2>
        </div>
        <a href="{{ route('service.category', 'all') }}" class="services__link--btn _icon-arrow-link">{{ __('Все услуги') }}</a>
      </div>
      @php
      $defaultActiveIndex = 0;
      @endphp
      <div data-tabs class="services__tabs tabs">
        <nav data-tabs-titles class="tabs__navigation">
          @foreach($categories as $index => $category)
          <button type="button" id="{{ $category->id }}" class="tabs__title {{ $index == $defaultActiveIndex ? '_tab-active' : '' }}">{{ $category->name[app()->getLocale()] }}</button>
          @endforeach
        </nav>
        <div data-tabs-body class="tabs__content">
          @foreach($categories as $category)
          <div class="tabs__services services-tabs">
            <div id="{{ $category->id }}" class="services-tabs__wrapper">
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
          @endforeach
        </div>
      </div>
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
        <form action="{{ route('send.form') }}" id="form_{{ rand(10000,99999) }}" method="post" class="contacts__form form-contacts">
            @csrf
          <div class="form-contacts__info">
            <div class="form-contacts__subtitle subtitle">{{ __('Свяжитесь с нами уже сегодня') }}</div>
            <div class="form-contacts__text">
              <p>{{ __('Не стесняйтесь обращаться к нам с любыми вопросами или запросами.') }}</p>
            </div>
          </div>
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

            <input type="hidden" name="country_code" value="">
            <input type="hidden" name="so" value="Invest">
            <input type="hidden" name="url" value="{{ url()->current() }}">
        </form>
      </div>
    </div>
  </section>
  <section class="video">
    <div class="video__container">
      <div class="video__wrapper">
        <div class="video__image lazy_image">
          <picture>
            <source data-srcset="{{ asset('img/main/video_image.webp') }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" type="image/webp"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{ __('img/main/video_image.jpeg') }}" alt="">
          </picture>
        </div>
        <a href="" data-popup="#popup-form" class="video__link _icon-play">{{ __('Play') }}</a>
      </div>
    </div>
  </section>
  <section class="reviews">
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
  <section class="contacts-form">
    <div class="contacts-form__container">
      <div class="contacts-form__wrapper">
        <div class="contacts-form__top">
          <div class="contacts-form__subtitle subtitle">{{ __('Свяжитесь с нами уже сегодня') }}</div>
          <h2 class="contacts-form__title">{{ __("Контакты") }}</h2>
        </div>
        <div class="contacts-form__body">
          <form action="{{ route('send.form') }}" id="form_{{ rand(10000,99999) }}" method="post" class="contacts-form__inner form-contacts">
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
            <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">{{ __('Подтвердить') }}
            </button>
              <input type="hidden" name="country_code" value="">
              <input type="hidden" name="so" value="Invest">
              <input type="hidden" name="url" value="{{ url()->current() }}">
          </form>
          <div class="contacts-form__info">
            <div class="contacts-form__text">
              <p>{{ __('Не стесняйтесь обращаться к нам с любыми вопросами или запросами.') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @section('seo')
  <div class="content__body baron__scroller">
    {!! $seo->seo_text[app()->getLocale()] !!}
  </div>
  @endsection
</main>
<style>
    @media (min-width: 47.99875em) {
        .main__body {
            height: 257px;
        }
    }
    @media (max-width: 47.99875em) {
        .main__body {
            height: 273px;
        }
    }
</style>
@endsection
