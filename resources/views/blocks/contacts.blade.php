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
                    <input type="hidden" name="so" value="{{ $invest }}">
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                </div>
                <div class="form-contacts__footers">
                    <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">{{ __('Подтвердить') }}</button>
                    @include('blocks.socials_white')
                </div>
            </form>

        </div>
    </div>
</section>
