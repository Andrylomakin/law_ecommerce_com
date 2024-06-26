<div class="socials">
    @if($settings->viber)
        <a href="viber://chat?number=%2B{{ $settings->viber }}" target="_blank"
           class="socials__item socials__item--link _viber">
            <img src="{{ asset('img/viber_white.svg') }}" alt="viber">
        </a>
    @endif
    @if($settings->whatsapp)
        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
           class="socials__item socials__item--link _whatsapp">
            <img src="{{ asset('img/whatsapp_white.svg') }}" alt="whatsapp">
        </a>
    @endif
    @if($settings->telegram)
        <a href="{{ $settings->telegram }}" target="_blank"
           class="socials__item socials__item--link _telegram">
            <img src="{{ asset('img/telegram_white.svg') }}" alt="telegram">
        </a>
    @endif
</div>
