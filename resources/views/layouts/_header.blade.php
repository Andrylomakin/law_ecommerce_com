<header class="header">
    <div class="header__container">
        <div class="header__wrapper">
            <a href="{{ route('index') }}" class="header__logo">
                <div class="header__image">
                    <img src="{{ asset('img/main/logo.svg') }}" alt="">
                </div>
                <div class="header__logo--text">{{ $settings->logo  }}</div>
            </a>
            <a href="{{ route('index') }}" class="header__logo header__logo--dark">
                <div class="header__image">
                    <img src="{{ asset('img/main/logo_dark.svg') }}" alt="">
                </div>
                <div class="header__logo--text">{{ $settings->logo  }}</div>
            </a>
            <div class="header__block">
                <div class="header__inner">
                    <nav class="header__menu menu">
                        <ul class="menu__list">
                            <li class="menu__item">
                                <div class="menu__item--spollers menu-spollers">
                                    <details class="menu-spollers__body" open>
                                        <summary class="menu-spollers__summary _spoller-active">
                                            <button type="button" class="menu-spollers__title _icon-arrow-down">{{ __('Услуги') }}
                                            </button>
                                        </summary>
                                        <div class="menu-spollers__list--body">
                                            <ul class="menu-spollers__list">
                                                @foreach($categoryMenu as $menu)
                                                <li class="menu-spollers__item">
                                                    <a href="{{ route('service.category', $menu->slug) }}" class="menu-spollers__link">{{ $menu->name[app()->getLocale()] }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </details>
                                </div>
                            </li>
                            <li class="menu__item">
                                <a href="{{ route('contact') }}" class="menu__link">{{ __('Контакты') }}</a>
                            </li>
                        </ul>
                    </nav>
                    <div data-dropdown-hover class="header__language language">

                        <button data-dropdown-button class="language__button _icon-arrow-down" data-value="en">
                                @foreach($languages as $language)
                                    @if($language['current'])
                                        {{ $language['title'] }}
                                    @endif
                                @endforeach
                        </button>

                        <ul data-dropdown-list class="language__list">
                            @foreach($languages as $language)
                                <li data-dropdown-item class="language__item" data-value="{{ $language['code'] }}">
                                    <a href="{{ $language['url'] }}">
                                        {{ $language['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <input type="text" name="select-language" value="" data-dropdown-input class="language__input">
                    </div>
                    @include('blocks.socials_sprite')
                    <div class="header__language-mob language-mob">
                        @foreach($languages as $language)
                            <div class="language-mob__item">
                                <input @if($language['current']) checked @endif
                                       class="language-mob__radio"
                                       type="radio"
                                       id="select-{{ $language['code'] }}"
                                       name="select_language-mob">
                                <label for="select-{{ $language['code'] }}">
                                    <a href="{{ $language['url'] }}"
                                       class="language-mob__link select-{{ $language['code'] }}">
                                        {{ $language['title'] }}
                                    </a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="header__wrap">
                    <button type="button" class="header__icon icon-menu"><span></span></button>
                    <a href="" data-popup="#popup-registration" data-so="@yield('so')" data-da=".header__inner,767.98,0" class="header__link--btn-lg _icon-arrow-link">{{ __('Регистрация') }}</a>
                    <a href="" data-popup="#popup-form" data-so="@yield('so')" class="header__consultation">{{ __('Консультация') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    .form-contacts__footers{
        display: flex;
        justify-content: space-between;
        align-items: center;
        align-content: center;
    }
    .header .socials{
        margin-left: 40px;
    }
    @media (max-width: 768px) {
        header ._spoller-active{
            display: none;
        }
        .form-contacts__footers{
            flex-direction: column;
            justify-content: center;
            gap: 15px;
        }
        .header .socials{
            margin-left: 0;
            margin-bottom: 20px;
        }
        .menu{
            margin-bottom: 10px;
        }
    }
    .page-service__wrapper{
        max-width: 100%;
        margin-left: 0;
    }
    .page-service__link--btn{
        margin-right: auto;
    }

    .footer__socials--link:hover{
        opacity: 0.5;
    }
    .socials{
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        gap: 15px;
    }
    .socials svg{
        width: 20px;
        height: 20px;
    }
    .socials__item--link{
        cursor: pointer;
    }
    .socials__item--link:hover{
        opacity: 0.5;
    }
    .popup-form__inner .form-contacts__footers{
        flex-direction: row-reverse;
    }
    .popup-form__inner .form-contacts__submit--btn-gr{
        margin-left: 0;
    }
    .iti__flag.iti__ru{
        opacity: 0.5;
        filter: grayscale(100%);
    }
    .services-tabs__text ul{
        display: flex;
        flex-direction: column;
    }
</style>
