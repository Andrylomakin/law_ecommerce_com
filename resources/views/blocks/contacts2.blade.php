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
                <div class="form-contacts__footers">
                    <button type="submit" class="form-contacts__submit--btn _icon-arrow-link">{{ __('Подтвердить') }}</button>
                    @include('blocks.socials_white')
                </div>

                <input type="hidden" name="country_code" value="">
                <input type="hidden" name="so" value="{{ $invest }}">
                <input type="hidden" name="url" value="{{ url()->current() }}">
            </form>
        </div>
    </div>
</section>
