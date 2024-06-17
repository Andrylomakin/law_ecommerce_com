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
                        <ul data-spollers="767.98,max" data-one-spoller="" class="menu__list">
                            <li class="menu__item">
                                <div class="menu__item--spollers menu-spollers">
                                    <details class="menu-spollers__body">
                                        <summary data-spoller data-spoller-close class="menu-spollers__summary">
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
