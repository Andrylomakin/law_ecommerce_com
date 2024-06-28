@extends('layouts.app')
@section('codePixel')
    @if($not_send_target_fb == false)
        {!! "fbq('track', 'Lead');" !!}
    @endif
@endsection

@section('codeTags')
    gtag('event', 'conversion', {
    'send_to': '{{ $settings->google_tags }}/{{ $settings->google_tags_conversion }}',
    'transaction_id': ''
    });
@endsection
@section('content')
<main class="main-dark">
  <section class="page-thanks">
    <div class="page-thanks__container">
      <div class="page-thanks__wrapper">
        <div class="page-thanks__content">
          <div class="page-thanks__subtitle subtitle">{{ __('Запрос успешно отправлен') }}</div>
          <h1 class="page-thanks__title">{{ __('Спасибо за обращение! Мы свяжемся с вами в скором времени') }}</h1>
          <a href="{{ route('service.category', 'all') }}" class="page-thanks__link--btn-gr _icon-arrow-link">{{ __('Наши услуги') }}</a>
        </div>
        <div class="page-thanks__image">
          <img src="{{ asset('img/main/charts-02.svg') }}" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="faq">
    <div class="faq__container">
      <div class="faq__wrapper">
        <h2 class="faq__title">{{ __('FAQ') }}</h2>
        <div data-spollers data-one-spoller class="faq__spollers spollers">
          <details data-open class="spollers__item">
            <summary class="spollers__title">{{ __('Что такое криптовалюта и как она работает?') }}</summary>
            <div class="spollers__body">
              <p>{{ __('Ответ1') }}</p>
            </div>
          </details>
          <details class="spollers__item">
            <summary class="spollers__title">{{ __('Как начать инвестировать в криптовалюты?') }}</summary>
            <div class="spollers__body">
              <p>{{ __("Ответ2") }}</p>
            </div>
          </details>
          <details class="spollers__item">
            <summary class="spollers__title">{{ __('Каковы основные риски инвестирования в криптовалюты?') }}</summary>
            <div class="spollers__body">
              <p>{{ __('Ответ3') }}</p>
            </div>
          </details>
          <details class="spollers__item">
            <summary class="spollers__title">{{ __('Как выбрать надежную криптовалютную платформу для торговли?') }}</summary>
            <div class="spollers__body">
              <p>{{ __('Ответ4') }}</p>
            </div>
          </details>
          <details class="spollers__item">
            <summary class="spollers__title">{{ __('Какие виды криптовалют представлены на вашей платформе?') }}</summary>
            <div class="spollers__body">
              <p>{{ __('Ответ5') }}</p>
            </div>
          </details>
          <details class="spollers__item">
            <summary class="spollers__title">{{ __('Сколько времени занимает обработка моих торговых ордеров?') }}</summary>
            <div class="spollers__body">
              <p>{{ __('Ответ6') }}</p>
            </div>
          </details>
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
</main>
@endsection
