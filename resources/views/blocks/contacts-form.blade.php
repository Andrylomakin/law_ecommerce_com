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
                    <div class="form-contacts__footers">
                        <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">
                            {{ __('Подтвердить') }}
                        </button>
                        @include('blocks.socials')
                    </div>
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
