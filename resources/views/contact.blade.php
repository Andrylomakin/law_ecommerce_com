@extends('layouts.app')
@section('meta_title', $seo->seo_title[app()->getLocale()] ?? '')
@section('meta_description', $seo->seo_description[app()->getLocale()] ?? '')
@section('content')
<main class="main-dark">
    <section class="page-contacts">
        <div class="page-contacts__container">
            <div class="page-contacts__wrapper">
                <div class="page-contacts__top">
                    <div class="page-contacts__subtitle subtitle">{{ __('Свяжитесь с нами') }}</div>
                    <h1 class="page-contacts__title">{{ __('Контакты') }}</h1>
                </div>
                <div class="page-contacts__body">
                    <div class="page-contacts__content">
                        <div class="page-contacts__info">
                            <!-- <div class="page-contacts__item">
                                    <div class="page-contacts__label">{{ __('Телефон') }}</div>
                                    <a href="tel:+75551234567" class="page-contacts__link">{{ __('+7 (555) 123-45-67') }}</a>
                                </div> -->
                            <div class="page-contacts__item">
                                <div class="page-contacts__label">Email</div>
                                <a href="mailto:{{ $settings->email  }}" class="page-contacts__link">
                                    {{ $settings->email  }}
                                </a>
                            </div>
                        </div>
                        <div class="page-contacts__address">
                            <div class="page-contacts__item">
                                <div class="page-contacts__label">{{ __('Адрес') }}</div>
                                <div class="page-contacts__link">750 Lexington Ave New York NY 10022-9808 USA</div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('send.form') }}" method="post" id="form_{{ rand(10000,99999) }}" class="page-contacts__form contacts-form__inner form-contacts">
                        @csrf
                        <div class="contacts-form__text--contacts">
                            <p>{{ __('Не стесняйтесь обращаться к нам с любыми вопросами или запросами.') }}</p>
                        </div>
                        <div class="form-contacts__inner">
                            <div class="form-contacts__item">
                                <input placeholder="{{ __('Имя*') }}" class="form-contacts__input" name="firstname" type="text">
                            </div>
                            <div class="form-contacts__item">
                                <input placeholder="{{ __('Фамилия*') }}" class="form-contacts__input" name="lastname" type="text">
                            </div>
                            <div class="form-contacts__item">
                                <input placeholder="Email*" class="form-contacts__input" name="email" type="email">
                            </div>
                            <div class="form-contacts__item">
                                <input class="form-contacts__input phone-mask" name="phone" type="tel">
                            </div>

                            <input type="hidden" name="country_code" value="">
                            <input type="hidden" name="so" value="Invest">
                            <input type="hidden" name="url" value="{{ url()->current() }}">
                        </div>
                        <button type="submit" class="form-contacts__submit--btn-gr _icon-arrow-link">{{ __('Подтвердить') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="registration registration-contacts">
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
    @section('seo')
    <div class="content__body baron__scroller">
        {!! $seo->seo_text[app()->getLocale()] !!}
    </div>
    @endsection
</main>
@endsection
