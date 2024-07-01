<div class="socials">
    @if($settings->viber)
        <a href="viber://chat?number=%2B{{ $settings->viber }}" target="_blank"
           class="socials__item socials__item--link _viber">
            <svg class="icon">
                <use xlink:href="{{ asset('img/socials.svg') }}#viber"></use>
            </svg>
        </a>
    @endif
    @if($settings->whatsapp)
        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
           class="socials__item socials__item--link _whatsapp">
            <svg class="icon">
                <use xlink:href="{{ asset('img/socials.svg') }}#whatsapp"></use>
            </svg>
        </a>
    @endif
    @if($settings->telegram)
        <a href="{{ $settings->telegram }}" target="_blank"
           class="socials__item socials__item--link _telegram">
            <svg class="icon">
                <use xlink:href="{{ asset('img/socials.svg') }}#telegram"></use>
            </svg>
        </a>
    @endif
</div>
