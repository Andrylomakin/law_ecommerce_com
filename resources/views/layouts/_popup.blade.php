<div id="popup-registration" aria-hidden="true" class="popup">
    <div class="popup__wrapper">
        <div class="popup__content popup-registration">
            <div class="popup-registration__wrapper registration__wrapper">
                <div class="registration__discount discount-registration">
                    <div data-da=".registration__content--popup,767.98,2" class="discount-registration__wrap">
                        <div class="discount-registration__title">{{ __('Получите скидку 100 USDT за регистрацию!') }}</div>
                        <div class="discount-registration__text">
                            <p>{{ __('Пройдите регистрацию, получите вознаграждения и начните путешествие вместе с нами!') }}</p>
                        </div>
                    </div>
                    <div class="discount-registration__image lazy_image">
                        <img data-src="{{ asset('img/main/line_chart.svg') }}" alt="">
                    </div>
                </div>
                <div class="registration__content registration__content--popup">
                    <button data-close type="button" class="registration__close _icon-close"></button>
                    <div class="registration__top">
                        <h3 class="registration__title">{{ __('Добро пожаловать в InsightCo') }}</h3>
                    </div>
                    <a href="" data-popup="#popup-form_registration" data-so="@yield('so')" class="registration__link _icon-user">{{ __('Регистрация по телефону/эл. почте') }}</a>
                    <div class="registration__row">
                        <div class="registration__info">{{ __('Уже есть аккаунт?') }}</div>
                        <a href="" data-popup="#popup-form_registration" data-so="@yield('so')" class="registration__login">{{ __('Войти') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup-form" aria-hidden="true" class="popup">
    <div class="popup__wrapper">
        <div class="popup__content popup-form">
            <div class="popup-form__top">
                <button data-close type="button" class="popup-form__close _icon-close"></button>
                <h4 class="popup-form__title">{{ __('Бесплатная консультация') }}</h4>
                <div class="popup-form__text">
                    <p>{{ __('Не стесняйтесь обращаться к нам с любыми вопросами или запросами.') }}</p>
                </div>
            </div>
            <form action="{{ route('send.form') }}" method="post" id="form_{{ rand(10000,99999) }}" class="popup-form__inner contacts-form__inner form-contacts">
                @csrf
                <div class="form-contacts__inner">
                    <div class="form-contacts__item">
                        <input placeholder="{{ __('Имя*') }}" class="form-contacts__input" name="firstname" type="text">
                    </div>
                    <div class="form-contacts__item">
                        <input placeholder="{{ __('Фамилия*') }}" class="form-contacts__input" name="lastname" type="text">
                    </div>
                    <div class="form-contacts__item">
                        <input class="form-contacts__input" name="email" type="email" placeholder="Email*">
                    </div>
                    <div class="form-contacts__item">
                        <input class="form-contacts__input phone-mask" name="phone" type="tel">
                    </div>

                    <input type="hidden" name="country_code" value="">
                    <input type="hidden" name="so" value="Invest">
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                </div>
                <button type="submit" class="form-contacts__submit--btn-gr _icon-arrow-link">{{ __('Подтвердить') }}</button>
            </form>
        </div>
    </div>
</div>
<div id="popup-form_registration" aria-hidden="true" class="popup">
    <div class="popup__wrapper">
        <div class="popup__content popup-form">
            <div class="popup-form__top">
                <button data-close type="button" class="popup-form__close _icon-close"></button>
                <h4 class="popup-form__title">{{ __('Бесплатная регистрация') }}</h4>
                <div class="popup-form__text">
                    <p>{{ __('Для регистрации на платформе введите данные и ожидайте звонок личного менеджера.') }}</p>
                </div>
            </div>
            <form action="{{ route('send.form') }}" method="post" id="form_{{ rand(10000,99999) }}" class="popup-form__inner contacts-form__inner form-contacts">
                @csrf
                <div class="form-contacts__inner">
                    <div class="form-contacts__item">
                        <input placeholder="{{ __('Имя*') }}" class="form-contacts__input" name="firstname" type="text">
                    </div>
                    <div class="form-contacts__item">
                        <input placeholder="{{ __('Фамилия*') }}" class="form-contacts__input" name="lastname" type="text">
                    </div>
                    <div class="form-contacts__item">
                        <input placeholder="{{ __('Email*') }}" class="form-contacts__input" name="email" type="email">
                    </div>
                    <div class="form-contacts__item">
                        <input class="form-contacts__input phone-mask" name="phone" type="tel">
                    </div>

                    <input type="hidden" name="country_code" value="">
                    <input type="hidden" name="so" value="Invest">
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                </div>
                <button type="submit" class="form-contacts__submit--btn-gr _icon-arrow-link">{{ __('Подтвердить') }}</button>
            </form>
        </div>
    </div>
</div>
