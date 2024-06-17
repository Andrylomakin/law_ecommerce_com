@extends('layouts.app')
@section('content')
<main class="main-dark">
  <section class="page-thanks">
    <div class="page-thanks__container">
      <div class="page-thanks__wrapper">
        <div class="page-thanks__content">
          <div class="page-thanks__subtitle subtitle">{{ __('Запрос не успешен') }}</div>
          <h1 class="page-thanks__title">{{ __('Ошибка номера, попробуйте снова') }}</h1>
          <a href="" data-popup="#popup-form" class="page-thanks__link--btn-gr _icon-arrow-link">{{ __('Попробовать еще раз') }}</a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection